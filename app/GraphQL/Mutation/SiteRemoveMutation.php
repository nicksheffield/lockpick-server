<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Models\Site as Model;

class SiteRemoveMutation extends Mutation {

	protected $attributes = [
		'name' => 'SiteRemove'
	];

	public function type() {
		return GraphQL::type('Site');
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