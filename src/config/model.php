<?php
	return [

		'acl' => [
			'additional' => [
				'menu.section.products' => 'Visualizza il blocco "Prodotti" nel menù laterale',
				'menu.section.administration' => 'Visualizza il blocco "Amministrazione" nel menù laterale',
				'menu.section.system' => 'Visualizza il blocco "Sistema" nel menù laterale'
			],
			'role_user_creation' => TRUE,
			'clean_permission' => TRUE,
			'assign' => [
			],
			'translate' => [
				'user.index' => 'Visualizza la lista degli utenti',
				'user.create' => 'Visualizza la pagina di creazione dell\'utente',
				'user.store' => 'Salvare il nuovo utente'
			]
		]
	];
