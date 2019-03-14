<?php

class Model{
	public function getBookList(){
		$dataBooks = array(
			'html' => array('Tài liệu HTML', 'Bố đời', 'Sách về ngôn ngữ HTML'),
			'css' => array('CSS beginner','HungPM', 'Dành cho người mới học'),
			'php' => array('PHP Advanced', 'Tom', 'Document PHP')
		);
		return $dataBooks;
	}

	public function getBook($_category){
		$all = $this->getBookList();
		return $all[$_category];
	}
}
?>