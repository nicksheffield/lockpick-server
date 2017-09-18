<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Models\Client as Model;

class ClientRemoveMutation extends Mutation {

	protected $attributes = [
		'name' => 'ClientRemove'
	];

	public function type() {
		return GraphQL::type('Client');
	}

	public function args() {
		return [
			'id' => ['name' => 'id', 'type' => Type::nonNull(Type::int())],
		];
	}

	public function resolve($root, $args) {
		$model = Model::find($args['id']);

		$model->delete();

		return $model;
	}
}