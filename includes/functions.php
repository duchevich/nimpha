<?php 
	class Item{
		public $name;
		public $link;
		public $price;

		function item_html(){

			echo "<figure>
						<p><img class=\"item-img\" src=\"$this->link\" alt=\"#\"></p>
						<figcaption>$this->name</figcaption>
						<p>Цена: $this->price грн.</p>
					</figure>";
		}
	}
	class User{
		public $login;
		public $email;
		public $password;
		public $password1;
		public $err_name;
        public $err_email;
        public $err_pass;
        public $err_pass1;
	}
 ?>
