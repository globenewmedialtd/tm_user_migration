<?php

namespace Drupal\tm_user_migration\Plugin\migrate\source;

use Drupal\migrate_drupal_d8\Plugin\migrate\source\d8\ContentEntity;
use Drupal\migrate\Row;

/**
 * Drupal 8 custom user source from database.
 *
 * @MigrateSource(
 *   id = "tm_custom_user",
 *   source_provider = "migrate_drupal_d8"
 * )
 */
class TmUser extends ContentEntity {

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    $uid = $row->getSourceProperty('uid');
    $roles = $this->getRoles($uid);
    if (!empty($roles)) {
      $row->setSourceProperty('roles', $roles);
    }
    return parent::prepareRow($row);
  }

  /**
   * This allows obtaining all the user roles..
   *
   * @param int $uid
   *   The user id.
   *
   * @return array
   *   The roles of the user.
   */
  protected function getRoles($uid) {
    /** @var \Drupal\Core\Database\Query\SelectInterface $query */
    $query = $this->select('user__roles', 'r')
      ->fields('r', ['roles_target_id'])
      ->condition('entity_id', $uid);
    return array_column($query->execute()->fetchAll(), 'roles_target_id');
  }
}

