# api.lockpick

## Deploy

```
> composer install
> cp .env.example .env
> nano .env
> php artisan key:generate
> php artisan migrate
```


## Mutations

### Client
```
mutation($name:String!) {
	ClientAdd(name: $name) {
		id
		name
	}
}

mutation($id:Int!, $name:String!) {
	ClientChange(id: $id, name: $name) {
		id
		name
	}
}

mutation($id:Int!) {
	ClientRemove(id: $id) {
		id
	}
}
```

### Site
```
mutation($name:String!, $url:String, $client_id:Int, $notes:String) {
	SiteAdd(name: $name, url: $url, client_id: $client_id, notes: $notes) {
		id
		name
		url
	}
}

mutation($id:Int!, $name:String!, $url:String, $client_id:Int, $notes:String) {
	SiteChange(id: $id, name: $name, url: $url, client_id: $client_id, notes: $notes) {
		id
		name
		url
	}
}

mutation($id:Int!) {
	SiteRemove(id: $id) {
		id
	}
}
```

### Logins
```
mutation($username:String!, $password:String!, $site_id:Int!, $notes:String) {
	LoginAdd(username: $username, password: $password, site_id: $site_id, notes: $notes) {
		id
		username
		password
	}
}

mutation($id:Int!, $username:String!, $password:String!, $site_id:Int!, $notes:String) {
	LoginChange(id: $id, username: $username, password: $password, site_id: $site_id, notes: $notes) {
		id
		username
		password
	}
}

mutation($id:Int!) {
	LoginRemove(id: $id) {
		id
	}
}
```