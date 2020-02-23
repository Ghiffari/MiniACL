# Mini ACL

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

## Installation

Via Composer

``` bash
$ composer require ghiffariaq/mini-acl
```

After finish installing using composer

1) Publish configuration file to specified your model namespace:

    ```
    php artisan vendor:publish
    ```

2) See config/miniacl.php, by default it has value App\User, you can change it if you have different namespace.

3) Run migrations

    ```
    php artisan migrate
    ```


4) Add MiniACL's trait to your user model:

    ```php
    use Ghiffariaq\MiniACL\Traits\HasRoles;

    class User extends Model
    {
        use HasRoles;
    }
    ```

## Console Usage

We have prepare simple example to assign any roles to specific user id by using this artisan command.

    php artisan assign:role {name} {user_id}



## Usage

### Assign Role to user

    $user = User::findOrFail($id);
    $user->assign('role_name');


### Remove Role from user

    $user = User::findOrFail($id);
    $user->retract('role_name');

### Retrieve All Roles

    $user = User::findOrFail($id);
    $user->roles;



### Check Whether user is a specific role

    $user = User::findOrFail($id);
    $user->isA('role_name');



## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email travish90@gmail.com instead of using the issue tracker.

## Credits

- [Ghiffari Assamar Qandi][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/Miqdadyyy/rajaongkirapi.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Miqdadyyy/rajaongkirapi.svg?style=flat-square


[link-packagist]: https://packagist.org/packages/ghiffariaq/mini-acl
[link-downloads]: https://packagist.org/packages/ghiffariaq/mini-acl
