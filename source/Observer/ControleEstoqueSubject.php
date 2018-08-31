<?php

namespace Observer;

class ControleEstoqueSubject implements Subject
{
    private $observers;

    public function atualizarEstoqueProduto(string $codigoProduto, int $novaQuantidade)
    {
        //Simular a atualização de estoque de um produto.
        if ($novaQuantidade == 0) {
            $this->notificarObserver($codigoProduto);
        }

    }

    public function removerObserver(Observer $observerRemover) : bool
    {
        foreach ($this->observers as $index => $observer) {
            if ($observer === $observerRemover) {
                unset($this->observers[$index]);
                return true;
            }

        }
    }
    
    public function adicionarObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function notificarObservers(string $codigoProduto)
    {
        foreach ($this->observers as $observer) {
            $observer->atualizado($codigoProduto);
        }
    }
}