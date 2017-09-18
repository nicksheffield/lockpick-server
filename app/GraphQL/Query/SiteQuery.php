<?php

namespace App\GraphQL\Query;

use DB;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Models\Site as Model;

class SiteQuery extends Query {

	protected $attributes = [
		'name' => 'sites'
	];

	public function type() {
		return Type::listOf(GraphQL::type('Site'));
	}

	public function args() {
		return [
			'id'    => [ 'name' => 'id',    'type' => Type::int()     ],
			'limit' => [ 'name' => 'limit', 'type' => Type::int()     ],
			'page'  => [ 'name' => 'page',  'type' => Type::int()     ],
			'sort'  => [ 'name' => 'sort',  'type' => Type::string()  ],
			'dir'   => [ 'name' => 'dir',   'type' => Type::string()  ],
			'trash' => [ 'name' => 'trash', 'type' => Type::boolean() ],
		];
	}

	public function resolve($root, $args) {
		$q = Model::query();

		if (isset($args['trash'])) {
			$q = $q->withTrashed();
		}

		if(isset($args['id'])) {
			$q = $q->where('id', $args['id']);
		} else {
			if (isset($args['limit'])) {
				$q = $q->take($args['limit']);

				if (isset($args['page'])) {
					$q = $q->skip(($args['page'] - 1) * $args['limit']);
				}
			}

			if (isset($args['sort'])) {
				$q = $q->orderBy($args['sort'], isset($args['dir']) ? $args['dir'] : 'asc');
			}
		}

		return $q->get();
	}

}