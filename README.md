# Contact Api

## API Reference

#### Login (Post)

```http
  http://127.0.0.1:8000/api/v1/login
```

| Arguments | Type   | Description                  |
| :-------- | :----- | :--------------------------- |
| email     | sting  | **Required** admin@gmail.com |
| password  | string | **Required** adfdafda        |

#### Register (Post)

```http
  http://127.0.0.1:8000/api/v1/register
```

| Arguments             | Type   | Description                  |
| :-------------------- | :----- | :--------------------------- |
| name                  | string | **Required** example name    |
| email                 | sting  | **Required** admin@gmail.com |
| password              | string | **Required** adfdafda        |
| password_confirmation | string | **Required** adfdafda        |

## User Profile

#### Logout (Post)

```http
  http://127.0.0.1:8000/api/v1/logout
```

#### Logout from all devices(Post)

```http
  http://127.0.0.1:8000/api/v1/logout-all
```

#### Get Devices (Get)

```http
  http://127.0.0.1:8000/api/v1/devices
```

## Contacts

### Get Contacts (Get)

```http
  http://127.0.0.1:8000/api/v1/contact
```

### Get Single Contact (Get)

```http
  http://127.0.0.1:8000/api/v1/contact
```

### Create Contact (Get)

```http
  http://127.0.0.1:8000/api/v1/contact
```

| Arguments    | Type    | Description                    |
| :----------- | :------ | :----------------------------- |
| name         | string  | **Required** example name      |
| country_code | integer | **Required** +95               |
| phone_number | number  | **Required** 09978987654       |
| email        | string  | **Nullable** example@gmail.com |
| company      | string  | **Nullable** company name      |
| jog_title    | string  | **Nullable** job               |
| birthday     | date    | **Nullable** date of birth     |

### Update Contact (Put)

```http
  http://127.0.0.1:8000/api/v1/contact/{id}
```

| Arguments    | Type    | Description                    |
| :----------- | :------ | :----------------------------- |
| name         | string  | **Required** example name      |
| country_code | integer | **Required** +95               |
| phone_number | number  | **Required** 09978987654       |
| email        | string  | **Nullable** example@gmail.com |
| company      | string  | **Nullable** company name      |
| jog_title    | string  | **Nullable** job               |
| birthday     | date    | **Nullable** date of birth     |

### Delete Contact (Delete)

```http
  http://127.0.0.1:8000/api/v1/contact/{id}
```
