<?php
namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

class Query
{

    public function attributeLabels(): array
    {
        return [
            'id_drug' => 'Лекарство',
            'id_pharmacy' => 'Аптека',
            'price' => 'Цена',
            'price_old' => 'Старая цена',
            'block' => 'Блокировать',
        ];
    }

    public function execute($query){
	$connection = Yii::$app->getDb();
	$query=$query;
	$connection->createCommand($query)->execute();
    }

    public function query($query){
	$connection = Yii::$app->getDb();
	$query=$query;
	return $connection->createCommand($query)->queryAll();
    }


    public function ChangeBlock($idDrug,$idPharmacy)
    {
	$price=Prices::find()->where(['id_drug'=>$idDrug,'id_pharmacy'=>$idPharmacy])->one();
	if(!$price)
		return false;
	$price->block=(($price->block)?0:1);
	$price->save();
	return true;
    }

    public function DrugsPrices($products,$id_city,$pharmacyId=0){

	$prices=[];
	if(($id_city) && count($products)){
		$PharmacyQuery="";
		if($pharmacyId)
			$PharmacyQuery=" AND id_pharmacy=".$pharmacyId;
		if(isset($products->id)){
			$p=Query::query("SELECT * from z_city_".$id_city." WHERE id_drug=".$products->id." AND price>0 ".$PharmacyQuery);
			$products[$products->id]=$products;
			}
		else	{
			$ids=join(",",array_column(ArrayHelper::toArray($products),'id'));
			$p=Query::query("SELECT * from z_city_".$id_city." WHERE id_drug IN (".$ids.") AND price>0 ".$PharmacyQuery);
			$products=ArrayHelper::index($products, 'id');
			}

		if(!count($p))
			return [];


		$ids=join(",",array_unique(array_column(ArrayHelper::toArray($p),'id_pharmacy')));
		$pharmacies=Pharmacies::find()->where("id IN (".$ids.")")->all();		
		$pharmacies=ArrayHelper::index($pharmacies, 'id');

//		for($i=0;$i<count($p);$i++){
		foreach($p as $product){
			$id=$product['id_drug'];
			$id_pharmacy=$product['id_pharmacy'];

			if($product['price_old']==$product['price'])
				$product['price_old']=0;

		        $prices[$id]['pharmacies'][$id_pharmacy]['id_pharmacy']=$id_pharmacy;
		        $prices[$id]['pharmacies'][$id_pharmacy]['price']=$product['price'];
		        $prices[$id]['pharmacies'][$id_pharmacy]['price_old']=$product['price_old'];
		        $prices[$id]['pharmacies'][$id_pharmacy]['discount']=ceil(($product['price_old']-$product['price'])*100/$product['price']);
		        $prices[$id]['pharmacies'][$id_pharmacy]['name']=$pharmacies[$id_pharmacy]->name;

		        $prices[$id]['form']=$products[$id]->pole2;
		        $prices[$id]['substance']=$products[$id]->pole1;
		        $prices[$id]['vendor']=$products[$id]->pole6;

			if(!isset($prices[$id]['min']))
		        	$prices[$id]['min']=999999999;
			if(!isset($prices[$id]['max']))
		        	$prices[$id]['max']=0;
			if($prices[$id]['min']>$product['price'])
		        	$prices[$id]['min']=$product['price'];
			if($prices[$id]['max']<$product['price'])
		        	$prices[$id]['max']=$product['price'];
			}
		}
	return $prices;

    }


    public function CreateTables($create=true){

	$cities=Cities::find()->select('id')->asArray()->all();
	$connection = Yii::$app->getDb();

	for($i=0;$i<count($cities);$i++){
//	for($i=0;$i<2;$i++){

		if($create)
			$query="
				SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
				SET time_zone = \"+00:00\";

				CREATE TABLE IF NOT EXISTS `z_city_".$cities[$i]['id']."` (
				  `id_drug` mediumint(8) UNSIGNED NOT NULL,
				  `id_pharmacy` mediumint(8) UNSIGNED NOT NULL,
				  `price` float(7,2) DEFAULT NULL,
				  `price_old` float(7,2) DEFAULT NULL,
				  `block` tinyint(1) DEFAULT '0'
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                
				CREATE TRIGGER `UpdatePrice".$cities[$i]['id']."` AFTER UPDATE ON `z_city_".$cities[$i]['id']."` FOR EACH ROW IF OLD.price_old<>NEW.price_old AND NEW.price_old>0 THEN BEGIN
				INSERT INTO prices_all VALUES(NEW.id_pharmacy,NEW.id_drug,NEW.price_old,UNIX_TIMESTAMP());
				END; END IF;

				ALTER TABLE `z_city_".$cities[$i]['id']."`
				  ADD KEY `id_pharmacy` (`id_pharmacy`),
				  ADD KEY `id_drug` (`id_drug`);
					";
		else
			$query="
				DROP TABLE IF EXISTS `z_city_".$cities[$i]['id']."`;
				";

		$command = $connection->createCommand($query);
		$command->execute();
		}
	
	return count($cities);
	
    }
    
        
        
}