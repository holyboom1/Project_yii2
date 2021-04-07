<?php

declare(strict_types=1);

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use common\helpers\Arr;

class AdminMenu extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%admin_menu}}';
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Пункт меню',
            'icon' => 'Иконка',
            'url' => 'URL',
            'order' => 'Последовательность',
        ];
    }

    public function rules()
    {
       return [
    	];
    }

    public function changeOrder($dir)
    {
	if($dir=="up")
		$one=$this->className()::find()->where('`order`<'.$this->order)->orderBy('`order` DESC')->one();
	else
		$one=$this->className()::find()->where('`order`>'.$this->order)->orderBy('`order`')->one();
	if(!$one)
		return false;

	$order=$one->order;
	$one->order=$this->order;
	$this->order=$order;
	$this->save(false);
	$one->save(false);

	return true;
    }

    // GET ADMIN ITEMS
    public function ItemsForWidget()
    {
	$curURL=$_SERVER['REQUEST_URI'];
	$items=[];
	$am=AdminMenu::find()->orderBy('order')->all();
	for($i=0;$i<count($am);$i++){
		$label=trim($am[$i]->name);
		$items[$label]['label']=$label;
		$items[$label]['icon']="fa fa-".$am[$i]->icon;
		$items[$label]['url']=$am[$i]->url;
		$items[$label]['active']=preg_match("/".preg_quote($am[$i]->url,"/")."(\?|$)/",$curURL);
		$items[$label]['order']=$am[$i]->order;
		}

	foreach($items as $label=>$item){
	        if(preg_match("/\//",$label)){
	        	$names=explode("/",$label);
			$names[0]=trim($names[0]);
			if(!isset($items[$names[0]])){
				$items[$names[0]]['label']=$names[0];
				$items[$names[0]]['icon']=$item['icon'];
				$items[$names[0]]['url']="#";
				$items[$names[0]]['order']=$item['order'];
				}
			$item['label']=$names[1];
			$items[$names[0]]['items'][]=$item;
			unset($items[$label]);
			}
		}

	$arr=new Arr();
	$arr->data=$items;
        $arr->Sort('order','asc','number');

	return $arr->data;
    }

    public function beforeSave($insert)
    {
    	if (parent::beforeSave($insert)){
	   if($insert){
		$maxOrder=$this->className()::find()->max('`order`');
		$maxOrder++;
		$this->order=$maxOrder;
		}
       	   return true;
	   }

	return false;
    }

}
/*
[
                      [
                          'label' => 'Пользователи',
                          'icon' => 'fa fa-users',
			  'url' => '#',
                          'active' => (($this->context->route == 'site/admins') || ($this->context->route == 'site/pharmacy-users') || ($this->context->route == 'site/customers')  || ($this->context->route == 'site/partners')  || ($this->context->route == 'site/partner-cities') || ($this->context->route == 'site/dealers')),
	                  'items' =>  [
                      			[
		                        'label' => 'Администраторы',
                		        'icon' => 'fa fa-users',
					'url' => ['/admins'],
					'active' => $this->context->route == 'site/admins',
					],
                      			[
		                        'label' => 'Клиенты',
                		        'icon' => 'fa fa-users',
					'url' => ['/customers'],
					'active' => $this->context->route == 'site/customers',
					],
                      			[
		                        'label' => 'Дилеры',
                		        'icon' => 'fa fa-users',
					'url' => ['/dealers'],
					'active' => $this->context->route == 'site/dealers',
					],
                      			[
		                        'label' => 'Партнеры',
                		        'icon' => 'fa fa-users',
					'url' => ['/partners'],
					'active' => (($this->context->route == 'site/partners')  || ($this->context->route == 'site/partner-cities')),
					],
                      			[
		                        'label' => 'Пользователи аптек',
                		        'icon' => 'fa fa-users',
					'url' => ['/pharmacy-users'],
					'active' => $this->context->route == 'site/pharmacy-users',
					],
				      ],
                      ],
                      [
                          'label' => 'Товары',
                          'icon' => 'fa fa-flask',
			  'url' => '#',
                          'active' => (($this->context->route == 'site/drugs') || ($this->context->route == 'site/drugscategories') || ($this->context->route == 'site/articlescategories') || ($this->context->route == 'site/drugslinks') || ($this->context->route == 'site/drugsmain')),
	                  'items' =>  [
                      			[
		                          'label' => 'Товары',
		                          'icon' => 'fa fa-flask',
		                          'url' => ['/drugs'],
                		          'active' => $this->context->route == 'site/drugs',
		                      ],        		
                    		      [
		                          'label' => 'Рубрики товаров',
		                          'icon' => 'fa fa-list',
		                          'url' => ['/drugscategories'],
                		          'active' => $this->context->route == 'site/drugscategories',
		                      ],        		
                    		      [
		                          'label' => 'Каталог / Главная',
		                          'icon' => 'fa fa-bars',
		                          'url' => ['/drugsmain'],
                		          'active' => $this->context->route == 'site/drugsmain',
		                      ],        		
                    		      [
		                          'label' => 'Быстрые ссылки',
		                          'icon' => 'fa fa-external-link',
		                          'url' => ['/drugslinks'],
                		          'active' => $this->context->route == 'site/drugslinks',
		                      ],        		
                    		      [
		                          'label' => 'Ссылки в поиске',
		                          'icon' => 'fa fa-external-link',
		                          'url' => ['/searchlinks'],
                		          'active' => $this->context->route == 'site/searchlinks',
		                      ],        		
				],
                      ],
                      [
                          'label' => 'Заказы',
                          'icon' => 'fa fa-shopping-cart',
                          'url' => ['/orders'],
                          'active' => $this->context->route == '/orders',
                      ],

                      [
                          'label' => 'Города',
                          'icon' => 'fa fa-building-o',
			  'url' => '#',
                          'active' => (($this->context->route == 'site/cities') || ($this->context->route == 'site/regions')),
	                  'items' =>  [
					[
					'label' => 'Города',
					'icon' => 'fa fa-building-o',
					'url' => ['/cities'],
					'active' => $this->context->route == 'site/cities',
					],
					[
					'label' => 'Регионы',
					'icon' => 'fa fa-globe',
					'url' => ['/regions'],
					'active' => $this->context->route == 'site/regions',
					],
				      ],
		      ],
                      [
                          'label' => 'Аптеки',
                          'icon' => 'fa fa-plus-square',
			  'url' => '#',
                          'active' => (($this->context->route == 'site/pharmacies') || ($this->context->route == 'site/pharmacy-networks') || ($this->context->route == 'site/pharmacies-users') || ($this->context->route == 'site/pharmacies-cashback-rule') || ($this->context->route == 'site/pharmacy-networks-cashback-rule')),
	                  'items' =>  [
	                      [                                                                                                                                                                                                                               
        	                  'label' => 'Аптеки',
                	          'icon' => 'fa fa-plus-square',
	                          'url' => ['/pharmacies'],
        	                  'active' => (($this->context->route == 'site/pharmacies')  || ($this->context->route == 'site/pharmacies-users')  || ($this->context->route == 'site/pharmacies-cashback-rule')),
                	      ],
	                      [
	                          'label' => 'Сети аптек',
	                          'icon' => 'fa fa-medkit',
	                          'url' => ['/pharmacy-networks'],
	                          'active' => (($this->context->route == 'site/pharmacy-networks')  || ($this->context->route == 'site/pharmacy-networks-cashback-rule')),
        	              ],
		      	],
		      ],
                      [
                          'label' => 'Текстовые страницы',
                          'icon' => 'fa fa-newspaper-o',
                          'url' => ['/pages'],
                          'active' => $this->context->route == '/pages',
                      ],
                      [
                          'label' => 'Платежи',
                          'icon' => 'fa fa-money',
                          'url' => ['/transfers'],
                          'active' => $this->context->route == '/transfers',
                      ],
                      [
                          'label' => 'Статистика',
                          'icon' => 'fa fa-bar-chart',
			  'url' => '#',
                          'active' => (($this->context->route == 'stat/customer') || ($this->context->route == 'stat/customer-one') || ($this->context->route == 'stat/customer-purchases')),
	                  'items' =>  [
                      		[
				'label' => 'Статистика по клиенту',
				'icon' => 'fa fa-bar-chart',
				'url' => ['/stat/customer'],
				'active' => (($this->context->route == 'stat/customer') || ($this->context->route == 'stat/customer-one') || ($this->context->route == 'stat/customer-purchases')),
				],
			   ],
                      ],
                      [
                          'label' => 'Параметры',
                          'icon' => 'fa fa-cogs',
                          'url' => ['/config'],
                          'active' => $this->context->route == '/config',
                      ],
                    ],
  */