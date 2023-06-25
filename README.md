# Kapcsolatfelvételi űrlap

## Telepités

Nvm telepítése:
```bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash
```
Ha esetleg nem találná az 'nvm' parancsot akkor:
```bash
source ~/.bashrc
```

Node telepítése, ehez a projekthez 'v18.15.0' verziót használjuk:
```bash
nvm install v18.15.0
```

Composer letöltése és telepítése:
[Composer](https://getcomposer.org/download/)

## Függőségek telepitése

```bash
composer install
```
```bash
npm install
```

## Futtatás
A fő mappábol az alábbi parancsokkat kell le futtatni.

Symfony server elindítása.
```bash
symfony server:start
```

### Egyszeri parancsok

Webpack encore build:
```bash
npm run build
```

Adatbázis létrehozása:
```bash
php bin/console doctrine:database:create
```

Adatbázis migráció:
```bash
php bin/console doctrine:migrations:migrate
```