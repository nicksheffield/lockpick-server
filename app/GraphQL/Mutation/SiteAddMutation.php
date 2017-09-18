<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Models\Site as Model;

class SiteAddMutation extends Mutation {

	protected $attributes = [
		'name' => 'SiteAdd'
	];

	public function type() {
		return GraphQL::type('Site');
	}

	public function args() {
		return [
			'name'      => ['name' => 'name',      'type' => Type::nonNull(Type::string())],
			'url'       => ['name' => 'url',       'type' => Type::string()],
			'client_id' => ['name' => 'client_id', 'type' => Type::int()],
		];
	}

	public function resolve($root, $args) {
		$model = Model::create($args);

		return $model;
	}
}