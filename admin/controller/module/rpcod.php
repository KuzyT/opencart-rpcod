<?php
class ControllerModuleRPCOD extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('module/rpcod');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/module');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			if (!isset($this->request->get['module_id'])) {
				$this->model_extension_module->addModule('rpcod', $this->request->post);
			} else {
				$this->model_extension_module->editModule($this->request->get['module_id'], $this->request->post);
			}

			$this->cache->delete('product');

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_default_yes'] = $this->language->get('text_default_yes');
		$data['text_default_no'] = $this->language->get('text_default_no');		
		
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_fio'] = $this->language->get('entry_fio');
		$data['entry_postcode'] = $this->language->get('entry_postcode');
		$data['entry_address'] = $this->language->get('entry_address');
		$data['entry_doc'] = $this->language->get('entry_doc');
		$data['entry_series'] = $this->language->get('entry_series');
		$data['entry_number'] = $this->language->get('entry_number');
		$data['entry_issue'] = $this->language->get('entry_issue');
		$data['entry_issue_date'] = $this->language->get('entry_issue_date');
		$data['entry_issue_year'] = $this->language->get('entry_issue_year');	
		$data['entry_default'] = $this->language->get('entry_default');	
		$data['entry_status'] = $this->language->get('entry_status');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}
		
		if (isset($this->error['fio'])) {
			$data['error_fio'] = $this->error['fio'];
		} else {
			$data['error_fio'] = '';
		}
		
		if (isset($this->error['postcode'])) {
			$data['error_postcode'] = $this->error['postcode'];
		} else {
			$data['error_postcode'] = '';
		}
		
		if (isset($this->error['address'])) {
			$data['error_address'] = $this->error['address'];
		} else {
			$data['error_address'] = '';
		}
		
		if (isset($this->error['number'])) {
			$data['error_number'] = $this->error['number'];
		} else {
			$data['error_number'] = '';
		}		
		
		if (isset($this->error['issue'])) {
			$data['error_issue'] = $this->error['issue'];
		} else {
			$data['error_issue'] = '';
		}
		
		if (isset($this->error['issue_date'])) {
			$data['error_issue_date'] = $this->error['issue_date'];
		} else {
			$data['error_issue_date'] = '';
		}
		
		if (isset($this->error['issue_year'])) {
			$data['error_issue_year'] = $this->error['issue_year'];
		} else {
			$data['error_issue_year'] = '';
		}	

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
		);

		if (!isset($this->request->get['module_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('module/banner', 'token=' . $this->session->data['token'], 'SSL')
			);
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('module/rpcod', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], 'SSL')
			);			
		}

		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('module/rpcod', 'token=' . $this->session->data['token'], 'SSL');
		} else {
			$data['action'] = $this->url->link('module/rpcod', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], 'SSL');
		}
		
		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
		}	
			
		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info)) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}
				
		if (isset($this->request->post['fio'])) {
			$data['fio'] = $this->request->post['fio'];
		} elseif (!empty($module_info)) {
			$data['fio'] = $module_info['fio'];
		} else {
			$data['fio'] = '';
		}	
				
		if (isset($this->request->post['postcode'])) {
			$data['postcode'] = $this->request->post['postcode'];
		} elseif (!empty($module_info)) {
			$data['postcode'] = $module_info['postcode'];
		} else {
			$data['postcode'] = '';
		}	
			
		if (isset($this->request->post['address'])) {
			$data['address'] = $this->request->post['address'];
		} elseif (!empty($module_info)) {
			$data['address'] = $module_info['address'];
		} else {
			$data['address'] = '';
		}
		
		if (isset($this->request->post['doc'])) {
			$data['doc'] = $this->request->post['doc'];
		} elseif (!empty($module_info)) {
			$data['doc'] = $module_info['doc'];
		} else {
			$data['doc'] = $this->language->get('passport');
		}	
				
		if (isset($this->request->post['series'])) {
			$data['series'] = $this->request->post['series'];
		} elseif (!empty($module_info)) {
			$data['series'] = $module_info['series'];
		} else {
			$data['series'] = '';
		}	
			
		if (isset($this->request->post['number'])) {
			$data['number'] = $this->request->post['number'];
		} elseif (!empty($module_info)) {
			$data['number'] = $module_info['number'];
		} else {
			$data['number'] = '';
		}

		if (isset($this->request->post['issue'])) {
			$data['issue'] = $this->request->post['issue'];
		} elseif (!empty($module_info)) {
			$data['issue'] = $module_info['issue'];
		} else {
			$data['issue'] = '';
		}	
				
		if (isset($this->request->post['issue_date'])) {
			$data['issue_date'] = $this->request->post['issue_date'];
		} elseif (!empty($module_info)) {
			$data['issue_date'] = $module_info['issue_date'];
		} else {
			$data['issue_date'] = '';
		}	
			
		if (isset($this->request->post['issue_year'])) {
			$data['issue_year'] = $this->request->post['issue_year'];
		} elseif (!empty($module_info)) {
			$data['issue_year'] = $module_info['issue_year'];
		} else {
			$data['issue_year'] = '';
		}		

		if (isset($this->request->post['default'])) {
			$data['default'] = $this->request->post['default'];
		} elseif (!empty($module_info)) {
			$data['default'] = $module_info['default'];
		} else {
			$data['default'] = '';
		}
		
		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '';
		}
			
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/rpcod.tpl', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/rpcod')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}
		
		if (!$this->request->post['fio']) {
			$this->error['fio'] = $this->language->get('error_fio');
		}
		
		if (!$this->request->post['postcode']) {
			$this->error['postcode'] = $this->language->get('error_postcode');
		}	
		
		if (!$this->request->post['address']) {
			$this->error['address'] = $this->language->get('error_address');
		}	

		if ($this->request->post['doc']) {		// Добавил возможность отправить без документа. Если поле пусто, то дальше не проверяется. Серия на всякий случай может быть пустой в любом случае.
			if (!$this->request->post['number']) {
				$this->error['number'] = $this->language->get('error_number');
			}	
			
			if (!$this->request->post['issue']) {
				$this->error['issue'] = $this->language->get('error_issue');
			}

			if (!$this->request->post['issue_date']) {
				$this->error['issue_date'] = $this->language->get('error_issue_date');
			}
			
			if (!$this->request->post['issue_year']) {
				$this->error['issue_year'] = $this->language->get('error_issue_year');
			}
		}
		
		return !$this->error;
	}
	
	public function autocomplete() {
		$json = array();

		$this->load->model('extension/module');
		
		$modules = $this->model_extension_module->getModulesByCode('rpcod');
		
		foreach ($modules as $module) {	
			$cod = unserialize($module['setting']);
			$json[] = array(
				'codprofile_id'     => $module['module_id'],
				'name'              => strip_tags(html_entity_decode($module['name'], ENT_QUOTES, 'UTF-8')),
				'fio' 				=> $cod['fio'],
				'postcode' 			=> $cod['postcode'],
				'address' 			=> $cod['address'],
				'doc' 				=> $cod['doc'],
				'series' 			=> $cod['series'],
				'number' 			=> $cod['number'],
				'issue' 			=> $cod['issue'],
				'issue_date' 		=> $cod['issue_date'],
				'issue_year' 		=> $cod['issue_year'],
			);
		}

		$sort_order = array();

		foreach ($json as $key => $value) {
			$sort_order[$key] = $value['name'];
		}

		array_multisort($sort_order, SORT_ASC, $json);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function getform() {
		$this->load->language('module/rpcod');

		if (!isset($this->session->data['token'])) {
			die($this->language->get('error_permission'));
		} else {
			// Add keys for missing post vars
			$keys = array(
				'fio',
				'doc',
				'series',
				'number',
				'issue_date',
				'issue_year',
				'issue',
				'postcode',
				'address',
				'sfio',				
				'spostcode',		
				'saddress',
				'os',
				'cod',				
			);

			foreach ($keys as $key) {
				if (!isset($this->request->post[$key])) {
					$this->request->post[$key] = '';
				}
			}	

			//Указываем путь до подготовленного документа
			$docxFile = DIR_TEMPLATE.'sale/prcod_form_113_117.tpl';
			if (!file_exists($docxFile)) {
				die($this->language->get('error_fnf'));
			}		
		
			$tmpfname = tempnam("/tmp", "cod");
			copy($docxFile, $tmpfname);
			
			$this->SetMant( array($this->language->get('num_rub'), $this->language->get('num_rub'), $this->language->get('num_rub')) );
			$this->SetExpon( array($this->language->get('num_cop'), $this->language->get('num_cop'), $this->language->get('num_cop')) ); 
			
			$fio = explode(' ', $this->request->post['fio']);
			if (isset($fio[0]))	$fam = $fio[0];		else $fam = '';
			if (isset($fio[1]))	$im = $fio[1];		else $im = '';
			if (isset($fio[2]))	$otch = $fio[2];	else $otch = '';
			if (intval($this->trimSum($this->request->post['os'])) <= 0)	$this->request->post['os'] = '0';	// Не пройдёт для сумм, меньших рубля, но здравого смысла ради не буду исправлять
			if (intval($this->trimSum($this->request->post['cod'])) <= 0)	$this->request->post['cod'] = '0';

			if ($this->request->post['postcode'] != '') {
				if ($this->request->post['address'] != '') {
					$FullAddrFrom = $this->request->post['postcode'].', '.$this->request->post['address'];
				} else {
					$FullAddrFrom = $this->request->post['postcode'];
				}
			} else {
				$FullAddrFrom = $this->request->post['address'];
			}
			
			if ($this->request->post['spostcode'] != '') {
				if ($this->request->post['saddress'] != '') {
					$FullAddrTo = $this->request->post['spostcode'].', '.$this->request->post['saddress'];
				} else {
					$FullAddrTo = $this->request->post['spostcode'];
				}
			} else {
				$FullAddrTo = $this->request->post['saddress'];
			}	
			
			//Список параметров
			$params = array(
				'{FIOfrom}'    		=> $this->request->post['fio'],
				'{FIOto}' 			=> $this->request->post['sfio'],
				'{SumRub}'    		=> $this->Convert($this->request->post['os'], false),
				'{SumRubCop}' 		=> $this->Convert($this->request->post['cod']),
				'{SNR}'    			=> $this->getRub($this->request->post['cod']),
				'{SOR}'    			=> $this->getRub($this->request->post['os']),
				'{SNK}' 			=> $this->getCop($this->request->post['cod']),
				'{doc}'    			=> $this->request->post['doc'],
				'{series}' 			=> $this->request->post['series'],
				'{number}'    		=> $this->request->post['number'],
				'{isd}' 			=> $this->request->post['issue_date'],
				'{isy}'    			=> $this->request->post['issue_year'],
				'{issue}' 			=> $this->request->post['issue'],
				'{FullAddrFrom}'	=> $FullAddrFrom,
				'{FullAddrTo}'  	=> $FullAddrTo,	
				'{INDTo}'			=> $this->request->post['spostcode'],
				'{AddrTo}'  		=> $this->request->post['saddress'],	
				'{FfromLN}'  		=> $fam,
				'{IfromLN}'  		=> $im,
				'{OfromLN}'  		=> $otch,
			);
			 
			if (!file_exists($tmpfname)) {
				die($this->language->get('error_fnf'));
			} else {
				$zip = new ZipArchive();
				 
				if (!$zip->open($tmpfname)) {
					die($this->language->get('error_fno'));
				} else {	 
					$documentXml = $zip->getFromName('word/document.xml');
					 
					//Заменяем все найденные переменные в файле на значения
					$documentXml = str_replace(array_keys($params), array_values($params), $documentXml);
					 
					$zip->deleteName('word/document.xml');
					$zip->addFromString('word/document.xml', $documentXml);
					 
					//Закрываем и сохраняем архив
					$zip->close();	
				}
			}
		$file = $this->language->get('text_file_name') . $this->request->post['order_id'] . '.docx';
		
		header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Disposition: attachment; filename="'.$file.'"');
		readfile($tmpfname);
		
		if (isset($tmpfname)) unlink($tmpfname);			
			
		}
	}
	
// Наложенный платёж и о/ц прописью
// (чуть подправленный скрипт 10-летней давности, найденный на просторах сети)

   var $Mant = array(); // описания мантисс
   // к примеру ('рубль', 'рубля', 'рублей')
   // или ('метр', 'метра', 'метров')
   var $Expon = array(); // описания экспонент
   // к примеру ('копейка', 'копейки', 'копеек')

   // установка описания мантисс
   function SetMant($mant)
   {
      $this->Mant = $mant;
   }

   // установка описания экспонент
   function SetExpon($expon)
   {
      $this->Expon = $expon;
   }

   // функция возвращает необходимый индекс описаний разряда
   // ('миллион', 'миллиона', 'миллионов') для числа $ins
   // например для 29 вернется 2 (миллионов)
   // $ins максимум два числа
   function DescrIdx($ins)
   {
      if(intval($ins/10) == 1) // числа 10 - 19: 10 миллионов, 17 миллионов
      return 2;
      else
      {
         // для остальных десятков возьмем единицу
         $tmp = $ins%10;
         if($tmp == 1) // 1: 21 миллион, 1 миллион
         return 0;
         else if($tmp >= 2 && $tmp <= 4)
         return 1; // 2-4: 62 миллиона
         else
         return 2; // 5-9 48 миллионов
      }
   }

   // IN: $in - число,
   // $raz - разряд числа - 1, 1000, 1000000 и т.д.
   // внутри функции число $in меняется
   // $ar_descr - массив описаний разряда ('миллион', 'миллиона', 'миллионов') и т.д.
   // $fem - признак женского рода разряда числа (true для тысячи)
   function DescrSot(&$in, $raz, $ar_descr, $fem = false)
   {
      $ret = '';

      $conv = intval($in / $raz);
      $in %= $raz;

      $descr = $ar_descr[ $this->DescrIdx($conv%100) ];

      if($conv >= 100)
      {
         $Sot = array($this->language->get('num_100'), $this->language->get('num_200'), $this->language->get('num_300'), $this->language->get('num_400'), $this->language->get('num_500'),
         $this->language->get('num_600'), $this->language->get('num_700'), $this->language->get('num_800'), $this->language->get('num_900'));
         $ret = $Sot[intval($conv/100) - 1] . ' ';
         $conv %= 100;
      }

      if($conv >= 10)
      {
         $i = intval($conv / 10);
         if($i == 1)
         {
            $DesEd = array($this->language->get('num_10'), $this->language->get('num_11'), $this->language->get('num_12'), $this->language->get('num_13'),
            $this->language->get('num_14'), $this->language->get('num_15'), $this->language->get('num_16'), $this->language->get('num_17'),
            $this->language->get('num_18'), $this->language->get('num_19') );
            $ret .= $DesEd[ $conv - 10 ] . ' ';
            $ret .= $descr;
            // возвращаемся здесь
            return $ret;
         }
         $Des = array($this->language->get('num_20'), $this->language->get('num_30'), $this->language->get('num_40'), $this->language->get('num_50'), $this->language->get('num_60'),
         $this->language->get('num_70'), $this->language->get('num_80'), $this->language->get('num_90') );
         $ret .= $Des[$i - 2] . ' ';
      }

      $i = $conv % 10;
      if($i > 0)
      {
         if( $fem && ($i==1 || $i==2) )
         {
            // для женского рода (сто одна тысяча)
            $Ed = array($this->language->get('num_fem_1'), $this->language->get('num_fem_2'));
            $ret .= $Ed[$i - 1] . ' ';
         }
         else
         {
            $Ed = array($this->language->get('num_1'), $this->language->get('num_2'), $this->language->get('num_3'), $this->language->get('num_4'), $this->language->get('num_5'),
            $this->language->get('num_6'), $this->language->get('num_7'), $this->language->get('num_8'), $this->language->get('num_9') );
            $ret .= $Ed[$i - 1] . ' ';
         }
      }
      $ret .= $descr;
      return $ret;
   }

   // IN: $sum - число, например 1256.18
   function Convert($sum, $full = true)
   {
      $ret = '';

      $Kop = 0;
      $Rub = 0;

      $sum = trim($sum);
      // удалим пробелы внутри числа
      $sum = str_replace(' ', '', $sum);

      // флаг отрицательного числа
      $sign = false;
      if($sum[0] == '-')
      {
         $sum = substr($sum, 1);
         $sign = true;
      }

      // заменим запятую на точку, если она есть
      $sum = str_replace(',', '.', $sum);

      $Rub = intval($sum);
      $Kop = intval($sum*100 - $Rub*100);	// Фикс с интвалом на всяк (KuzyT)
	  $retKop = false;	// Не возвращать копейки, если 0 рублей(KuzyT)

      if($Rub)
      {
		 $retKop = true; 
         // значение $Rub изменяется внутри функции DescrSot
         // новое значение: $Rub %= 1000000000 для миллиарда
         if($Rub >= 1000000000)
         $ret .= $this->DescrSot($Rub, 1000000000,
         array($this->language->get('num_billion'), $this->language->get('num_billions'), $this->language->get('num_billionss'))) . ' ';
         if($Rub >= 1000000)
         $ret .= $this->DescrSot($Rub, 1000000,
         array($this->language->get('num_million'), $this->language->get('num_millions'), $this->language->get('num_millionss')) ) . ' ';
         if($Rub >= 1000)
         $ret .= $this->DescrSot($Rub, 1000,
         array($this->language->get('num_thousand'), $this->language->get('num_thousands'), $this->language->get('num_thousandss')), true) . ' ';

         $ret .= $this->DescrSot($Rub, 1, $this->Mant) . ' ';

         // если необходимо поднимем регистр первой буквы
		 // Для наложенного все строчные, так что закомментируем (KuzyT)
         //$ret[0] = chr( ord($ret[0]) + ord('A') - ord('a') );
         // для корректно локализованных систем можно закрыть верхнюю строку
         // и раскомментировать следующую (для легкости сопровождения)
         // $ret[0] = strtoupper($ret[0]);
      }
	  
	  if($full && $retKop) {
		  // Переменная на случай, когда нужна сумма без копеек, и доп. проверка рубля (KuzyT)
		  if($Kop < 10)
		  $ret .= '0';
		  $ret .= $Kop . ' ' . $this->Expon[ $this->DescrIdx($Kop) ];
	  }

      // если число было отрицательным добавим минус
      if($sign && $Rub)
      $ret = '-' . $ret;
      return $ret;
   }	
	
// Рубли и копейки

public function getRub($sum){
	$Rub = 0;

	$sum = $this->trimSum($sum);

	$Rub = intval($sum);
	
	return $Rub;
}

public function getCop($sum){
	$Kop = 0;
	$Rub = 0;

	$sum = $this->trimSum($sum);

	$Rub = intval($sum);
	$Kop = intval($sum*100 - $Rub*100);
	
	return $Kop;
}	

public function trimSum($sum) {
	$sum = trim($sum);
	// удалим пробелы внутри числа
	$sum = str_replace(' ', '', $sum);

	// заменим запятую на точку, если она есть
	$sum = str_replace(',', '.', $sum);
	
	return $sum;
}

}