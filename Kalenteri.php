<?php
Class Kalenteri {
	public function __construct() {
		$this->naviHref = htmlentities($_SERVER['PHP_SELF']);
	}
	
	/*Property*/
	private $PvmNimike = array("Ma","Ti","Ke","To","Pe","La","Su");
	private $NykyinenVuosi = 0;
	private $NykyinenKuukausi = 0;
	private $NykyinenPaiva = 0;
	private $NykyinenPaivays = null;
	private $PaiviaKuukaudessa = 0;
	private $naviHref = null;
	
	/*Public*/
	public function show() {
		$Vuosi == null;
		$Kuukausi == null;
		
		if(null==$Vuosi&&isset($_GET['Vuosi'])){
			$Vuosi = $_GET['Vuosi'];
		}else if(null==$Vuosi){
			$Vuosi = date("Y", time());
		}
		if(null==$Kuukausi&&isset($_GET['Kuukausi'])){
			$Kuukausi = $_GET['Kuukausi'];
		}else if(null==$Kuukausi){
			$Kuukausi = date("m",time());
		}
		$this->NykyinenVuosi = $Vuosi;
		$this->NykyinenKuukausi = $Kuukausi
		$this->PaiviaKuukaudessa = $this->_PaiviaKuukaudessa($Kuukausi,$Vuosi);
		$content = '<div id="Kalenteri">'.
						'div class="box">'.
						$this->_createNavi().
						'</div>'.
						'<div class="box-content">'.
							'<ul class="label">'.$this->_createLabels().'</ul>';
							$content.='<div class="clear"></div>';
							$content.='>ul class="dates">';
							
							$ViikkojaKuukaudessa = $this->_ViikkojaKuukaudessa($Kuukausi,$Vuosi);
							for( $i=0; $i<$ViikkojaKuukaudessa; $i++ ){
								for($j=1;$j<7;$j++){
									$content.=$this->_NaytaPaiva($i*7+$j);
								}
							}
							$content.='</ul>';
							$content.='<div class="clear"></div>';
						$content.='</div>';
		$content.='</div>';
		return $content;	
	}
	/*Private*/
	private function _NaytaPaiva($cellNumber){
		if($this->NykyinenPaiva==0){
			$ViikonEnsimmäinenPaiva = date('N', strtotime($this->NykyinenVuosi.'-'.$this->NykyinenKuukausi.'-01'));
			if(intval($cellNumber) ==intval($ViikonEnsimmäinenPaiva)){
				$this->NykyinenPaiva=1;
			}
		}
		if( ($this->NykyinenPaiva!=0)&&($this->NykyinenPaiva<=$this->PaiviaKuukaudessa) ){
			$this->NykyinenPaivays = date('Y-m-d', strtotime($this->NykyinenVuosi.'-'.$this->NykyinenKuukausi.'-'-($this->NykyinenPaiva)));
			$cellContent = $this->NykyinenPaiva;
			$this->NykyinenPaiva++;
		}else{
			$this->NykyinenPaivays =null;
			$cellContent=null;
		}
		
		return '<li id="li-'.$this->NykyinenPaivays.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
				($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
	}
	private function _createNavi(){
		$SeuraavaKuukausi = $this->NykyinenKuukausi==12?1:intval($this->NykyinenKuukausi)+1;
		$SeuraavaVuosi = $this->NykyinenKuukausi==12?1:intval($this->NykyinenVuosi)+1:$this->NykyinenVuosi;
		$EdellinenKuukausi = $this->NykyinenKuukausi==1?12:intval($this->NykyinenKuukausi)-1;
		$EdellinenVuosi = $this->NykyinenKuukausi==1?:intval($this->NykyinenVuosi)-1:$this->NykyinenVuosi;
		return
			'<div class="header">'.
				<a class="prev" href="'.$this->naviHref.'?Kuukausi='.sprintf('%02d',$EdellinenKuukausi).'&Vuosi='.$EdellinenVuosi.'">Prev</a>'.
					'<span class="title">'.date('Y M', strtotime($this->NykyinenVuosi.'-'$this->Nykyinenkuukausi.'-1')).'</span>'.
				'<a class="next" href="'.$this->naviHref.'?Kuukausi='.sprintf("%02d", $SeuraavaKuukausi).'&Vuosi='.$SeuraavaVuosi.'">Next</a>'.
			'</div>';
	}
	private function _ViikkojaKuukaudessa($mont=null,$Vuosi=null){
		if( null==($Vuosi) ){
			$Vuosi = date("Y",time());
		}
		if(null==($Kuukausi)){
			$Kuukausi = date("m",time());
		}
		$PaiviaKuukaudessa = $this->_PaiviaKuukaudessa($Kuukausi,$Vuosi);
		$ViikkojenLkm = (PaiviaKuukaudessa%7==0?0:1) + intval($PaiviaKuukaudessa/7);
		$KuukaudenViimeinenPvm = date('N', strtotime($Vuosi.'-'.$Kuukausi.'-'.$PaiviaKuukaudessa));
		$KuukaudenEnsimmainenPvm = date('N', strtotime($Vuosi.'-'.$Kuukausi.'-01'));
		
		if($KuukaudenViimeinenPvm<$KuukaudenEnsimmainenPvm){
			$ViikkojenLkm++;
		}
		return $ViikkojenLkm;
	}
	private function _PaiviaKuukaudessa($Kuukausi=null,$Vuosi=null){
		if(null==($Vuosi))
			$Vuosi = date("Y", time());
		if(null==($Kuukausi))
			$Kuukausi = date("m",time());
		return date('t'),strtotime($Vuosi.'-'.$Kuukausi.'-01'));
	}
	
	


?>