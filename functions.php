<?php 
	class Item{
		public $name;
		public $link;
		public $price;

		function item_html(){

			echo "<figure><p><img class=\"item-img\" src=\"$this->link\" alt=\"#\"></p><figcaption>$this->name</figcaption><p>Цена: $this->price грн.</p></figure>";
		}
	}
 ?>

<!--  <figure>
<img src="$this->link" alt="#">
	<figcaption>$this->name</figcaption>
</figure>
<p>$this->price</p> -->