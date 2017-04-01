<?

namespace app\components;
use yii\base\Widget;
use app\models\Category;
use Yii;
class MenuWidget extends Widget
{
	public $tpl;
	public $data;
	public $tree;
	public $menuHtml;

	public function run(){
		//get cache Там можно кешировать данные
		$menu = Yii::$app->cache->get('menu');
		if ($menu) {
			return $menu;
		}else{
		$this->data = Category::find()->indexBy('id')->asArray()->all();
		$this->tree = $this->map_tree($this->data);
		$this->menuHtml = $this->categories_to_string($this->tree);
		//debug($this->tree);

		//set Ceche
		Yii::$app->cache->set('menu',$this->menuHtml,3600);
		return $this->menuHtml;
	}
	}

	protected function map_tree($dataset) {
	$tree = array();

	foreach ($dataset as $id=>&$node) {    
		if (!$node['parent_id']){
			$tree[$id] = &$node;
		}else{ 
            $dataset[$node['parent_id']]['childs'][$id] = &$node;
		}
	}

	return $tree;
	}

	protected function categories_to_string($data){
		$string='';
	foreach($data as $item){
		//debug($item);
		$string .= $this->categories_to_template($item);
	}
	return $string;
	}

	protected function categories_to_template($category){ 
	ob_start();
	include __DIR__ . '/menu_tpl/'.$this->tpl;
	return ob_get_clean();
	}

	public function init(){
		parent::init();
		if ($this->tpl === NULL) {
			$this->tpl = 'menu';
		}
		$this->tpl .= '.php';

	}
	
}