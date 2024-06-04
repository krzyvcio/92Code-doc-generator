# 92Code.pl app for microcompany-mangement

## Instalation

```
./vendor/bin/sail up
```

### Snippets

Make factory & seeder

```bash
./vendor/bin/sail artisan make:factory UserFactory --model=User
./vendor/bin/sail artisan make:seeder UserSeeder


```

Seed fresh

```bash
./vendor/bin/sail artisan migrate:fresh --seed --drop-tables
./vendor/bin/sail artisan migrate:fresh --seed
```

Enter to the shell

```bash
./vendor/bin/sail shell
```
