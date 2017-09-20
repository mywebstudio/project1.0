<?php

// Поможет при длительном выполнении скрипта
set_time_limit(0);
$host=''; // Хост сайта
$scheme='http://'; // http или https?
$urls=array(); // Здесь будут храниться собранные ссылки
$content=NULL; // Рабочая переменная
// Здесь ссылки, которые не должны попасть в sitemap.xml
$nofollow=array('/404');
// Первой ссылкой будет главная страница сайта, ставим ей 0, т.к. она ещё не проверена
$urls[$scheme.$host]='0';
// Разрешённые расширения файлов, чтобы не вносить в карту сайта ссылки на медиа файлы. Также разрешены страницы без разрешения, у меня таких страниц подавляющее большинство.
$extensions[]='php';$extensions[]='aspx';$extensions[]='htm';$extensions[]='html';$extensions[]='asp';$extensions[]='cgi';$extensions[]='pl';
// Корневая директория сайта, значение можно взять из $_SERVER['DOCUMENT_ROOT'].'/';
$engine_root= '';

// Функция для сбора ссылок
function sitemap_geturls($page,&$host,&$scheme,&$nofollow,&$extensions,&$urls)
{
//Возможно уже проверяли эту страницу
    if($urls[$page]==1) continue ;
//Получаем содержимое ссылки. если недоступна, то заканчиваем работу функции и удаляем эту страницу из списка
    $content=file_get_contents($page);if(!$content){unset($urls[$page]);return false;}
//Отмечаем ссылку как проверенную (мы на ней побывали)
    $urls[$page]=1;
//Проверяем не стоит ли запрещающий индексировать ссылки на этой странице мета-тег с nofollow|noindex|none
    if(preg_match('/<[Mm][Ee][Tt][Aa].*[Nn][Aa][Mm][Ee]=.?("|\'|).*[Rr][Oo][Bb][Oo][Tt][Ss].*?("|\'|).*?[Cc][Oo][Nn][Tt][Ee][Nn][Tt]=.*?("|\'|).*([Nn][Oo][Ff][Oo][Ll][Ll][Oo][Ww]|[Nn][Oo][Ii][Nn][Dd][Ee][Xx]|[Nn][Oo][Nn][Ee]).*?("|\'|).*>/',$content)){$content=NULL;}
//Собираем все ссылки со страницы во временный массив, с помощью регулярного выражения.
    preg_match_all("/<[Aa][\s]{1}[^>]*[Hh][Rr][Ee][Ff][^=]*=[ '\"\s]*([^ \"'>\s#]+)[^>]*>/",$content,$tmp);$content=NULL;
//Добавляем в массив links все ссылки не имеющие аттрибут nofollow
    foreach($tmp[0] as $k => $v){if(!preg_match('/<.*[Rr][Ee][Ll]=.?("|\'|).*[Nn][Oo][Ff][Oo][Ll][Ll][Oo][Ww].*?("|\'|).*/',$v)){$links[$k]=$tmp[1][$k];}}
    unset($tmp);
//Обрабатываем полученные ссылки, отбрасываем "плохие", а потом и с них собираем...
    for ($i = 0; $i < count($links); $i++)
    {
//Если слишком много ссылок в массиве, то пора прекращать нашу деятельность (читай спецификацию)
        if(count($urls)>49900){return false;}
//Если не установлена схема и хост ссылки, то подставляем наш хост
        if(!strstr($links[$i],$scheme.$host)){$links[$i]=$scheme.$host.$links[$i];}
//Убираем якори у ссылок
        $links[$i]=preg_replace("/#.*/X", "",$links[$i]);
//Узнаём информацию о ссылке
        $urlinfo=@parse_url($links[$i]);if(!isset($urlinfo['path'])){$urlinfo['path']=NULL;}
//Если хост совсем не наш, ссылка на главную, на почту или мы её уже обрабатывали - то заканчиваем работу с этой ссылкой
        if((isset($urlinfo['host']) AND $urlinfo['host']!=$host) OR $urlinfo['path']=='/' OR isset($urls[$links[$i]]) OR strstr($links[$i],'@')){continue;}
//Если ссылка в нашем запрещающем списке, то также прекращаем с ней работать
        $nofoll=0;if($nofollow!=NULL){foreach($nofollow as $of){if(strstr($links[$i],$of)){$nofoll=1;break;}}}if($nofoll==1){continue;}
//Если задано расширение ссылки и оно не разрешёно, то ссылка не проходит
        $ext=end(explode('.',$urlinfo['path']));
        $noext=0;if($ext!='' AND strstr($urlinfo['path'],'.') AND count($extensions)!=0){$noext=1;foreach($extensions as $of){if($ext==$of){$noext=0;continue;}}}if($noext==1){continue;}
//Заносим ссылку в массив и отмечаем непроверенной (с неё мы ещё не забирали другие ссылки)
        $urls[$links[$i]]=0;
//Проверяем ссылки с этой страницы
        sitemap_geturls($links[$i],$host,$scheme,$nofollow,$extensions,$urls);
    }
    return true;
}

// (START!) Первоначальный старт функции для проверки главной страницы и последующих
sitemap_geturls($scheme.$host,$host,$scheme,$nofollow,$extensions,$urls);

// Когда все ссылки собраны, то обрабатываем их и записываем в файлы sitemap.xml и sitemap.txt (должны быть права на запись)
$sitemapXML='<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">
    <!-- Last update of sitemap '.date("Y-m-d H:i:s+06:00").' -->';
$sitemapTXT=NULL;

// Добавляем каждую ссылку
foreach($urls as $k => $v){$sitemapXML.="\r\n<url><loc>{$k}</loc><changefreq>weekly</changefreq><priority>0.5</priority></url>";$sitemapTXT.="\r\n".$k;}

//Окончание для файла sitemap.xml
$sitemapXML.="\r\n</urlset>";

//Некоторые символы, а также кириллица - должны быть в правильной кодировке/виде (по спецификации)
$sitemapXML=trim(strtr($sitemapXML,array('%2F'=>'/','%3A'=>':','%3F'=>'?','%3D'=>'=','%26'=>'&','%27'=>"'",'%22'=>'"','%3E'=>'>','%3C'=>'<','%23'=>'#','&'=>'&')));
$sitemapTXT=trim(strtr($sitemapTXT,array('%2F'=>'/','%3A'=>':','%3F'=>'?','%3D'=>'=','%26'=>'&','%27'=>"'",'%22'=>'"','%3E'=>'>','%3C'=>'<','%23'=>'#','&'=>'&')));

//Запись в файл
$fp=fopen($engine_root.'sitemap.txt','w+');if(!fwrite($fp,$sitemapTXT)){echo 'Ошибка записи!';}fclose($fp);
$fp=fopen($engine_root.'sitemap.xml','w+');if(!fwrite($fp,$sitemapXML)){echo 'Ошибка записи!';}fclose($fp);

?>