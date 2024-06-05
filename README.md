
## How to

In project directory

- make up
- make migrate
- make seed

Aftre that routes:
- GET {host}/api/articles
- GET {host}/api/articles/1
- PUT {host}/api/articles/changeStatus
  - Body - "{"data\":{"id":"1","is_active":0}}"
