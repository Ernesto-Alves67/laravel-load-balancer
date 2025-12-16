## Balanceamento de carga com Nginx no Laravel com docker

- Implementação simples de balanceamento de carga.

## Rodando e testando aplicação

run comand: sudo docker compose up -d --build
stop comand: docker down

### testando performance da api
ab -n 1000 -c 10 http://localhost/api/hello