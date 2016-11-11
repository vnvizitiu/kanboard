Group Member API Procedures
===========================

## getMemberGroups

- Prop�sito: **Obtener todos los grupos de un usuario determinado**
- Par�metros:
    - **user_id** (integer, required)
- Resultado en caso de �xito: **List of groups**
- Resultado en caso de falla: **false**

Ejemplo de solicitud:

```json
{
    "jsonrpc": "2.0",
    "method": "getMemberGroups",
    "id": 1987176726,
    "params": [
        "1"
    ]
}
```

Ejemplo de respuesta:

```json
{
    "jsonrpc": "2.0",
    "id": 1987176726,
    "result": [
        {
            "id": "1",
            "name": "My Group A"
        }
    ]
}
```

## getGroupMembers

- Prop�sito: **Obtener todos los miembros de un grupo**
- Par�metros:
    - **group_id** (integer, required)
- Resultado en caso de �xito: **List of users**
- Resultado en caso de falla: **false**

Ejemplo de solicitud:

```json
{
    "jsonrpc": "2.0",
    "method": "getGroupMembers",
    "id": 1987176726,
    "params": [
        "1"
    ]
}
```

Ejemplo de respuesta:

```json
{
    "jsonrpc": "2.0",
    "id": 1987176726,
    "result": [
        {
            "group_id": "1",
            "user_id": "1",
            "id": "1",
            "username": "admin",
            "is_ldap_user": "0",
            "name": null,
            "email": null,
            "notifications_enabled": "0",
            "timezone": null,
            "language": null,
            "disable_login_form": "0",
            "notifications_filter": "4",
            "nb_failed_login": "0",
            "lock_expiration_date": "0",
            "is_project_admin": "0",
            "gitlab_id": null,
            "role": "app-admin"
        }
    ]
}
```

## addGroupMember

- Prop�sito: **Agregar un usuario a un grupo**
- Par�metros:
    - **group_id** (integer, required)
    - **user_id** (integer, required)
- Resultado en caso de �xito: **true**
- Resultado en caso de falla: **false**

Ejemplo de solicitud:

```json
{
    "jsonrpc": "2.0",
    "method": "addGroupMember",
    "id": 1589058273,
    "params": [
        1,
        1
    ]
}
```

Ejemplo de respuesta:

```json
{
    "jsonrpc": "2.0",
    "id": 1589058273,
    "result": true
}
```

## removeGroupMember

- Prop�sito: **Quitar un usuario de un grupo**
- Par�metros:
    - **group_id** (integer, required)
    - **user_id** (integer, required)
- Resultado en caso de �xito: **true**
- Resultado en caso de falla: **false**

Ejemplo de solicitud:

```json
{
    "jsonrpc": "2.0",
    "method": "removeGroupMember",
    "id": 1730416406,
    "params": [
        1,
        1
    ]
}
```

Ejemplo de respuesta:

```json
{
    "jsonrpc": "2.0",
    "id": 1730416406,
    "result": true
}
```

## isGroupMember

- Prop�sito: **Comprobar si un usuario es miembro de un grupo**
- Par�metros:
    - **group_id** (integer, required)
    - **user_id** (integer, required)
- Resultado en caso de �xito: **true**
- Resultado en caso de falla: **false**

Ejemplo de solicitud:

```json
{
    "jsonrpc": "2.0",
    "method": "isGroupMember",
    "id": 1052800865,
    "params": [
        1,
        1
    ]
}
```

Ejemplo de respuesta:

```json
{
    "jsonrpc": "2.0",
    "id": 1052800865,
    "result": false
}
```
