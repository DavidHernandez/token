<?php

/**
 * @file
 * Contains \Drupal\token\Controller\TokenTreeController.
 */

namespace Drupal\token\Controller;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Returns tree responses for tokens.
 */
class TokenTreeController extends ControllerBase {

  /**
   * Page callback to output a token tree as an empty page.
   */
  function outputTree(Request $request) {
    $build['#title'] = $this->t('Available tokens');

    $options = $request->attributes->has('options') ? Json::decode($request->attributes->get('options')) : array();

    // Force the dialog option to be false so we're not creating a dialog within
    // a dialog.
    $options['dialog'] = FALSE;
    $build['tree']['#markup'] = _theme('token_tree', $options);

    return $build;
  }

}
