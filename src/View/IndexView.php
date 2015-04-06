<?php

class IndexView {
	protected $template;
	protected $content;

	public function __construct($db) {
		$mustache = new Mustache_Engine(array(
		    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/../../templates')
		));
		$this->template = $mustache->loadTemplate('index');
		$personDao = new PersonDAO($db);
		$persons = $personDao->getAllPersons();
		$this->content = array(
			'name' => 'Romack L. Natividad',
			'persons' => $persons
		);
	}

	public function render() {
		return $this->template->render($this->content);
	}
}