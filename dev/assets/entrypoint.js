// モジュールとなるjsファイルの読み込み
import {module_jquery_easing} from './js/jquery.easing';
import {module_common} from './js/common';
import {module_index} from './js/index';
import {module_vegas} from './js/vegas.min';
import {module_magnific} from './js/jquery.magnific-popup.min';
import {module_magnific_setting} from './js/jquery.magnific-popup.setting';

// モジュール先にある関数を実行
module_common();
module_index();
module_jquery_easing();
module_vegas();
module_magnific();
module_magnific_setting();

// Sassファイルの読み込み
import './sass/style.scss';