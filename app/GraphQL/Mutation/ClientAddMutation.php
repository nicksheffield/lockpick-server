<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Models\Client as Model;

class ClientAddMutation extends Mutation {

	protected $attributes = [
		'name' => 'ClientAdd'
	];

	public function type() {
		return GraphQL::type('Client');
	}

	public function args() {
		return [
			'name'  => ['name' => 'name',  'type' => Type::nonNull(Type::string())],
			'notes' => ['name' => 'notes', 'type' => Type::string()],
		];
	}

	public function resolve($root, $args) {
		$model = Model::create($args);

		return $model;
	}
}