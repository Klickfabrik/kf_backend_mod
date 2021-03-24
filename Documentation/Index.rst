.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: Includes.txt
.. include:: Images.txt


T3 Backend Modification
=======================

:Author: |author|
:Rendered: |today|
:Extension Key: kf_backend_mod
:Language: en
:Keywords: forAdmins, forDevelopers, backendModification, T3 Backend

Copyright 2015-2017, |author|

This document is published under the Open Content License
available from http://www.opencontent.org/opl.shtml
The content of this document is related to TYPO3
\- a GNU/GPL CMS/Framework available from www.typo3.org


What does it do?
----------------
It's modify the Backend-view. I think the best view is a small view and not the largest icons in T3.
This modification reduce the icon and allow to modifiy some css stlyes in backend.
Also i use a small jquery script to reduce the content in the previewfields.

- smaller Icons (reduce to: 32x32px > 20x20px;)

- javascript to crop long texte (maxLength = 250)

- save-icons not in dropdown, Icons next to each other (faster to save, save and new, save and close)


Custom-Modification
-------------------

- With this extension you can write in the page a custom-class field
>> See: _sample/page_class.ts

- Also you can add a special SEO-Title if you want
>> See: _sample/page_title.ts



Screenshots
-----------

- Smaller Icons in the sidebar with navigation to saving space

|be-smallicon|

- Saveicons in the front of the elements, dont have a dropdownmenü.

|be-saveicon|

