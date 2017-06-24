<?php
	
			
	class Entry
	{
		private $idData;
		private $word;
		private $nature; 

		public function set_Entry($t1 = 0, $t2 = 0, $t3 = 0)
		{
			// verifie si le pseudo n'est pas vide ou ne contient rien

			if(!empty($t1))
			{
				$this->idData = $t1;
			}
			else
			{
				$this->idData = NULL;
			}

			if(!empty($t2))
			{
				$this->word = $t2;
			}
			else
			{
				$this->word = NULL;
			}

			if(!empty($t3))
			{
			
				$this->nature = $t3;
			}
			else
			{
				$this->nature = NULL;
			}

		}

		public function insert_Entry()
		{

			$b = connectDb();

			$que = $b->prepare('insert
					into Entry(idData, word, nature)
					values(
						:idData,
						:word,
						:nature
						)
					');

			$que->execute(array(
					'idData' => $this->idData,
					'word' => $this->word,
					'nature' => $this->nature
				));
			$que->closeCursor();
		}
	}
