<?php

namespace QUI\FeatureList;

use QUI;
use QUI\Projects\Site\Edit;

/**
 * FAQ Events
 *
 * @author www.pcsg.de (Henning Leutz)
 */
class EventsHandler
{
    const SITE_TYPE_LIST     = 'quiqqer/feature-list:types/list';
    const SITE_TYPE_CATEGORY = 'quiqqer/feature-list:types/category';
    const SITE_TYPE_ENTRY    = 'quiqqer/feature-list:types/entry';

    /**
     * event on child create
     *
     * @param integer $newId
     * @param \QUI\Projects\Site\Edit $Parent
     *
     * @throws QUI\Exception
     */
    public static function onChildCreate($newId, $Parent)
    {
        $type = $Parent->getAttribute('type');

        if ($type != 'quiqqer/feature-list:types/list'
            && $type != 'quiqqer/feature-list:types/category'
        ) {
            return;
        }

        $Project = $Parent->getProject();
        $Site    = new Edit($Project, $newId);

        if ($type == 'quiqqer/feature-list:types/list') {
            $Site->setAttribute('type', 'quiqqer/feature-list:types/category');
        }

        if ($type == 'quiqqer/feature-list:types/category') {
            $Site->setAttribute('type', 'quiqqer/feature-list:types/entry');
        }

        $Site->save();
    }
}
