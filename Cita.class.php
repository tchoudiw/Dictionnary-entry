<?php
	
			
	class Cita
	{
		private $trans;
		private $idCita;
		private $idData;
		private $cf;
		private $syn; 
		private $NB;
		private $anto;
		private $hom;

		public function set_Cita($t1 = 0, $t2 = 0, $t3 = 0, $t4 = 0, $t5 = 0, $t6 = 0, $t7 = 0, $t8 = 0)
		{
			// verifie si le pseudo n'est pas vide ou ne contient rien

			if(!empty($t1))
			{
				$this->trans = $t1;
			}
			else
			{
				$this->trans = NULL;
			}

			if(!empty($t2))
			{
				$this->idCita = $t2;
			}
			else
			{
				$this->idCita = NULL;
			}

			if(!empty($t3))
			{
			
				$this->idData = $t3;
			}
			else
			{
				$this->idData = NULL;
			}

			if(!empty($t4))
			{
				$this->cf = $t4;
			}
			else
			{
				$this->cf = NULL;
			}

			if(!empty($t5))
			{
				$this->syn = $t5;
			}
			else
			{
				$this->syn = NULL;
			}
			if(!empty($t6))
			{
				$this->NB = $t6;
			}
			else
			{
				$this->NB = NULL;
			}
			if(!empty($t7))
			{
				$this->anto = $t7;
			}
			else
			{
				$this->anto = NULL;
			}
			if(!empty($t8))
			{
				$this->hom = $t8;
			}
			else
			{
				$this->hom = NULL;
			}
		}

		public function insert_Cita()
		{

			$bd = connectDb();

			$quer = $bd->prepare('insert
					into Cita(idCita, idData, trans, cf, syn, anto, hom, NB)
					values(
						:idCita,
						:idData,
						:trans,
						:cf,
						:syn,
						:anto
						:hom
						:NB
						)
					');

			$quer->execute(array(
					'idCita' => $this->idCita,
					'idData' => $this->idData,
					'trans' => $this->trans,
					'cf' => $this->cf,
					'syn' => $this->syn,
					'anto' => $this->anto,
					'hom' => $this->hom,
					'NB' => $this->NB
				));
			$quer->closeCursor();
		}

		public function affiche()
		{
			echo $this->idCita;
			echo '<br>';
			echo $this->idData;
			echo '<br>';
			echo $this->trans;
			echo '<br>';
			echo $this->cf;
			echo '<br>';
			echo $this->syn;
			echo '<br>';
			echo $this->anto;
			echo '<br>';
			echo $this->hom;
			echo '<br>';
			echo $this->NB;
			echo '<br>';
		}
	}
