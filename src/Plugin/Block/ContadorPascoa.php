<?php

namespace Drupal\feliz_pascoa\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "contador_pascoa_block",
 *   admin_label = @Translation("Contador"),
 * )
 */
class ContadorPascoa extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
      $diaAtual = date ("Y/m/d");

      $diaPascoa = date ("2020/04/12");

      //converte os dias para timestamp
      $d1 = strtotime($diaAtual);
      $d2 = strtotime($diaPascoa);

      //diferença em segudos das duas datas divididas pelo número de segundos que o dia possui
      //resulta o número de dias entre as duas datas.
      $diasTotais = ($d2-$d1)/86400;

      if($diasTotais !== 0){
        $resultado = "Faltam $diasTotais dias para a Páscoa!";
      }
      else{
        $resultado = "Feliz Páscoa";
      }
      $resultado .= "<a href='/Drupal8/pascoa'><br>Acesse aqui</a>";
    return [
      '#markup' => $resultado,
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
  /*  $this->configuration['my_block_settings'] = $form_state->getValue('my_block_settings');
  */}
}