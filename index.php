<?php
function revertCharacters($str) {
  $result = [];

  $arrOfWords = explode(' ', $str);
  foreach ($arrOfWords as $word) {
    $splitWord = mb_str_split($word);

    $punctuation = null;
    if (preg_match('/[.,!?;:]/', $splitWord[count($splitWord) - 1])) {
      $punctuation = array_pop($splitWord);
    }

    $reversed = array_reverse($splitWord);

    $lastChar = $reversed[count($reversed) - 1];
    if (mb_strtoupper($lastChar) === $lastChar) {
      $reversed[count($reversed) - 1] = mb_strtolower($lastChar);
      $reversed[0] = mb_strtoupper($reversed[0]);
    }

    if ($punctuation) {
      $reversed[] = $punctuation;
    }
    
    $result[] = implode('', $reversed);
  }

  return implode(' ', $result);
}

$result = revertCharacters("Привет! Давно не виделись.");
echo $result;

function d($data) {
  echo "<pre>" . print_r($data, 1) . "</pre>";
}