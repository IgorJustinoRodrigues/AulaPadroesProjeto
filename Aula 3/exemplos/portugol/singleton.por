programa
{
    // Variável global para armazenar a instância única
    inteiro volume = 50
    logico instanciaCriada = falso

    // Função para obter a instância única
    funcao obterInstancia()
    {
        se (instanciaCriada == falso)
        {
            instanciaCriada = verdadeiro
            escreva("Instância única criada.\n")
        }
        senao
        {
            escreva("Instância já existente.\n")
        }
    }

    // Funções para manipular o volume
    funcao definirVolume(inteiro novoVolume)
    {
        volume = novoVolume
    }

    funcao inteiro obterVolume()
    {
        retorne volume
    }

    // Função principal
    funcao inicio()
    {
        // Obtendo a instância única
        obterInstancia()

        // Definindo o volume
        definirVolume(75)

        // Verificando o volume
        escreva("Volume atual: ", obterVolume(), "\n")

        // Tentando obter outra instância (será a mesma)
        obterInstancia()
    }
}
