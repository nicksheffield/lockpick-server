<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Models\Client as Model;

class ClientChangeMutation extends Mutation {

	protected $attributes = [
		'name' => 'ClientChange'
	];

	public function type() {
		return GraphQL::type('Client');
	}

	public function args() {
		return [
			'name' => ['name' => 'name', 'type' => Type::nonNull(Type::string())],
		];
	}

	public function resolve($root, $args) {
		$model = Model::create($args);

		$model->fill($args);

		return $model;
	}
}