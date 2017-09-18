<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Models\Login as Model;

class LoginRemoveMutation extends Mutation {

	protected $attributes = [
		'name' => 'LoginRemove'
	];

	public function type() {
		return GraphQL::type('Login');
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