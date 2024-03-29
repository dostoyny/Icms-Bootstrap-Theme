<?php

class formTemplateOptions extends cmsForm {

    public function init() {

        return array(

            array(
                'type' => 'fieldset',
                'title' => LANG_PAGE_LOGO,
                'childs' => array(
                    new fieldImage('logo', array(
                        'options' => array(
                            'sizes' => array('small', 'original')
                        )
                    )),
                )
            ),

            array(
                'type' => 'fieldset',
                'title' => LANG_THEME_COPYRIGHT,
                'childs' => array(

                    new fieldString('owner_name', array(
                        'title' => LANG_TITLE
                    )),

                    new fieldString('owner_url', array(
                        'title' => LANG_THEME_COPYRIGHT_URL,
                        'hint' => LANG_THEME_COPYRIGHT_URL_HINT
                    )),

                    new fieldString('owner_year', array(
                        'title' => LANG_THEME_COPYRIGHT_YEAR,
                        'hint' => LANG_THEME_COPYRIGHT_YEAR_HINT
                    )),

                )
            ),

            array(
                'type' => 'fieldset',
                'title' => LANG_THEME_LAYOUT_COLUMNS,
                'childs' => array(

                    new fieldList('aside_pos', array(
                        'title' => LANG_THEME_LAYOUT_SIDEBAR_POS,
                        'default' => 'right',
                        'items' => array(
                            'left' => LANG_THEME_LAYOUT_LEFT,
                            'right' => LANG_THEME_LAYOUT_RIGHT,
                        )
                    )),

                )
            ),
            array(
                'type' => 'fieldset',
                'title' => LANG_THEME_OTHER,
                'childs' => array(

                    new fieldString('site_languages', array(
                        'title' => LANG_THEME_SITE_LANGUAGES,
                        'default' => 'ru',
                        'hint' => LANG_THEME_SITE_LANGUAGES_HINT,
                    )),

                )
            ),


        );

    }

}
