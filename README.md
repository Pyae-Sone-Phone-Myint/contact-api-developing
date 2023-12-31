# Contact Api

## API Reference

#### Login (Post)

```https
  http://127.0.0.1:8000/api/v1/login
```

| Arguments | Type   | Description                  |
| :-------- | :----- | :--------------------------- |
| email     | sting  | **Required** admin@gmail.com |
| password  | string | **Required** adfdafda        |

#### Register (Post)

```https
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

```https
  http://127.0.0.1:8000/api/v1/logout
```

#### Logout from all devices(Post)

```https
  http://127.0.0.1:8000/api/v1/logout-all
```

#### Get Devices (Get)

```https
  http://127.0.0.1:8000/api/v1/devices
```

## Contacts

#### Get Contacts (Get)

```https
  http://127.0.0.1:8000/api/v1/contact
```

##### Note : you can search by using name and phone number

#### Get Single Contact (Get)

```https
  http://127.0.0.1:8000/api/v1/contact
```

#### Create Contact (Post)

```https
  http://127.0.0.1:8000/api/v1/contact
```

| Arguments    | Type    | Description                    |
| :----------- | :------ | :----------------------------- |
| name         | string  | **Required** example name      |
| country_code | integer | **Required** +95               |
| phone_number | number  | **Required** 09978987654       |
| is_favorite  | boolean | **Required** false             |
| email        | string  | **Nullable** example@gmail.com |
| company      | string  | **Nullable** company name      |
| jog_title    | string  | **Nullable** job               |
| birthday     | date    | **Nullable** date of birth     |
| photo        | string  | **Nullable** user.png          |

#### Update Contact (Put)

```https
  http://127.0.0.1:8000/api/v1/contact/{id}
```

| Arguments    | Type    | Description                    |
| :----------- | :------ | :----------------------------- |
| name         | string  | **Required** example name      |
| country_code | integer | **Required** +95               |
| phone_number | number  | **Required** 09978987654       |
| is_favorite  | boolean | **Required** false             |
| email        | string  | **Nullable** example@gmail.com |
| company      | string  | **Nullable** company name      |
| jog_title    | string  | **Nullable** job               |
| birthday     | date    | **Nullable** date of birth     |
| photo        | string  | **Nullable** user.png          |

## Deleting Method

#### Delete Contact (Delete)

```https
  http://127.0.0.1:8000/api/v1/contact/{id}
```

#### Multiple Delete Contact (Post)

```https
  http://127.0.0.1:8000/api/v1/contact/bulk-delete
```

| Arguments | Type  | Description          |
| :-------- | :---- | :------------------- |
| ids       | array | **Required** [2,4,6] |

#### Get Trashed Contacts (Get)

```https
  http://127.0.0.1:8000/api/v1/contact-trash
```

#### Restore (Post)

```https
  http://127.0.0.1:8000/api/v1/contact/restore/{id}
```

#### Restore All Contacts (Post)

```https
  http://127.0.0.1:8000/api/v1/contact/restore-all
```

#### Force Delete Contact (Delete)

```https
  http://127.0.0.1:8000/api/v1/contact/force-delete/{id}
```

#### Force Delete All Contact (Post)

```https
  http://127.0.0.1:8000/api/v1/contact/force-delete-all
```

## Favorite Contact

#### Add favorite (Post)

```https
  http://127.0.0.1:8000/api/v1/favorite/{id}
```

##### Note : you could add or remove to favorite list

#### Favorite Lists (Post)

```https
  http://127.0.0.1:8000/api/v1/favorites
```

## Recently Search

#### Get Search Records (Post)

```https
  http://127.0.0.1:8000/api/v1/contact/get-records
```

#### Delete All Records (Delete)

```https
  http://127.0.0.1:8000/api/v1/contact/delete-records
```
