# Ontologia de GTA

- [Executar o projeto](#executar-o-projeto)
- [Requisitos](#requisitos)
- [Instalar Docker](#instalar-docker)
- [Instalar Docker Compose](#instalar-docker-compose)



# Requisitos

Existem duas formas utilizar o site no local, pode ser utilizando docker e docker-compose ou utilizando o composer.

# Instalar Docker

1. **Atualize o índice de pacotes do APT**

   ```bash
   sudo apt-get update
   ```

2. **Instale pacotes necessários para permitir o APT usar um repositório via HTTPS**

   ```bash
   sudo apt install apt-transport-https ca-certificates curl software-properties-common
   ```

3. **Adicione a chave GPG oficial do Docker**

   ```bash
   curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
   ```

4. **Adicione o repositório do Docker às fontes do APT**

   Para arquitetura `x86_64 / amd64`:

   ```bash
   sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
   ```

   Ajuste o comando acima se estiver usando uma arquitetura diferente (`armhf`, `arm64`, etc.).

5. **Atualize o índice de pacotes do APT novamente**

   ```bash
   sudo apt update
   ```

6. **Instale o Docker CE (Community Edition)**

   ```bash
   sudo apt-get install docker-ce
   ```

7. **Verifique se o Docker foi instalado corretamente**

   ```bash
   sudo docker run hello-world
   ```

### Adicionar seu usuário ao grupo Docker

Para usar o Docker sem o `sudo`:

```bash
sudo usermod -aG docker ${USER}
su - ${USER}
```

Você precisará sair da sessão atual e entrar novamente para que essa mudança tenha efeito.

# Instalar Docker Compose

1. **Baixe a versão mais recente do Docker Compose**

   Verifique a [página de lançamentos do Docker Compose](https://github.com/docker/compose/releases) para a versão mais recente e substitua `1.29.2` pela versão atual no comando abaixo:

   ```bash
   sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
   ```

2. **Torne o binário do Docker Compose executável**

   ```bash
   sudo chmod +x /usr/local/bin/docker-compose
   ```

3. **Verifique se o Docker Compose foi instalado corretamente**

   ```bash
   docker-compose --version
   ```

# Executar o projeto

Para executar o projeto, só é necessário rodar o comando ``docker-compose up -d`` dentro da pasta do projeto e depois ir no [localhost](http://localhost)
