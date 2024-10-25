programa
{
    // Funções para criar e processar tipos de veículos
    funcao cadeia criarCarro()
    {
        retorne "Carro criado com sucesso!"
    }

    funcao cadeia criarMoto()
    {
        retorne "Moto criada com sucesso!"
    }

    // Função fábrica que cria veículos de acordo com o tipo
    funcao cadeia criarVeiculo(cadeia tipo)
    {
        se (tipo == "carro")
        {
            retorne criarCarro()
        }
        senao se (tipo == "moto")
        {
            retorne criarMoto()
        }
        senao
        {
            retorne "Tipo de veículo inválido!"
        }
    }

    // Função principal
    funcao inicio()
    {
        // Criando um carro usando a fábrica
        cadeia resultadoCarro = criarVeiculo("carro")
        escreva(resultadoCarro, "\n")

        // Criando uma moto usando a fábrica
        cadeia resultadoMoto = criarVeiculo("moto")
        escreva(resultadoMoto, "\n")

        // Tentando criar um veículo inválido
        cadeia resultadoInvalido = criarVeiculo("bicicleta")
        escreva(resultadoInvalido, "\n")
    }
}
