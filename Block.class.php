<?php
	
	class Block
	{
		private $lang;
		private $fran;
		private $genre;
		private $idBlock;
		private $idCita; 

		public function set_Block($t1 = 0, $t2 = 0, $t3 = 0, $t4 = 0, $t5 = 0)
		{
			// verifie si le pseudo n'est pas vide ou ne contient rien

			if(!empty($t1) and strlen($t1)>0)
			{
				$this->lang = $t1;
			}
			else
			{
				$this->lang = NULL;
			}

			if(!empty($t2) and strlen($t2)>0)
			{
				$this->fran = $t2;
			}
			else
			{
				$this->fran = NULL;
			}

			if(!empty($t3) and strlen($t3)>0)
			{
			
				$this->genre = $t3;
			}
			else
			{
				$this->genre = NULL;
			}

			if(!empty($t4) and strlen($t4)>0)
			{
				$this->idBlock = $t4;
			}
			else
			{
				$this->idBlock = NULL;
			}

			if(!empty($t5) and strlen($t5)>0)
			{
				$this->idCita = $t5;
			}
			else
			{
				$this->idBlock = NULL;
			}
		}

		public function insert_Block()
		{

			$bdd = connectDb();

			$query = $bdd->prepare('insert
					into block(idBlock, idCita, lang, fran, genre)
					values(
						:idBlock,
						:idCita,
						:lang,
						:fran,
						:genre
						)
					');

			$query->execute(array(
					'idBlock' => $this->idBlock,
					'idCita' => $this->idCita,
					'lang' => $this->lang,
					'fran' => $this->fran,
					'genre' => $this->genre
				));
			$query->closeCursor();
		}
	}
