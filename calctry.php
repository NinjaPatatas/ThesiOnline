  
<?php

// Function to tokenize a sentence
function tokenize($sentence)
{
    // Use a simple whitespace tokenizer
    return explode(' ', strtolower($sentence));
}

// Function to calculate term frequencies for a document
function calculateTermFrequency($tokens)
{
    $termFrequency = [];

    foreach ($tokens as $token) {
        if (!isset($termFrequency[$token])) {
            $termFrequency[$token] = 1;
        } else {
            $termFrequency[$token]++;
        }
    }

    // Normalize term frequencies
    $totalTokens = count($tokens);
    foreach ($termFrequency as &$count) {
        $count /= $totalTokens;
    }

    return $termFrequency;
}

// Function to calculate inverse document frequencies
function calculateInverseDocumentFrequency($documents)
{
    $documentFrequency = [];

    foreach ($documents as $document) {
        foreach (array_unique($document) as $term) {
            if (!isset($documentFrequency[$term])) {
                $documentFrequency[$term] = 1;
            } else {
                $documentFrequency[$term]++;
            }
        }
    }

    $totalDocuments = count($documents);
    $inverseDocumentFrequency = [];

    foreach ($documentFrequency as $term => $count) {
        $inverseDocumentFrequency[$term] = log($totalDocuments / $count, 2);
        echo $totalDocuments;
        echo "@".$count;
    }

    return $inverseDocumentFrequency;
}

// Function to calculate TF-IDF scores for a document
function calculateTfIdf($termFrequency, $inverseDocumentFrequency)
{
    $tfIdf = [];
    
    foreach ($termFrequency as $term => $tf) {
        $tfIdf[$term] = $tf * $inverseDocumentFrequency[$term];
    }

    return $tfIdf;
}






        

    
        // Two example sentences
        $sentence1 = 'the ball is red';
        $sentence2 = 'blue';
        
        // Tokenize sentences
        $tokens1 = tokenize($sentence1);
        $tokens2 = tokenize($sentence2);
        
        // Calculate term frequencies for each sentence
        echo $termFrequency1 = calculateTermFrequency($tokens1);
        echo $termFrequency2 = calculateTermFrequency($tokens2);
        
        // Create a document matrix
        echo $documents = [$tokens1, $tokens2];
        
        // Calculate inverse document frequencies
        echo $inverseDocumentFrequency = calculateInverseDocumentFrequency($documents);
        
        // Calculate TF-IDF scores for each sentence
        echo $tfIdf1 = calculateTfIdf($termFrequency1, $inverseDocumentFrequency);
        echo $tfIdf2 = calculateTfIdf($termFrequency2, $inverseDocumentFrequency);
        
        // Display TF-IDF scores
        //echo "TF-IDF Scores for Sentence 1:\n";
        //print_r($tfIdf1);
        
        //echo "\nTF-IDF Scores for Sentence 2:\n";
        //print_r($tfIdf2);
        $totalTfIdf2 = number_format(array_sum($tfIdf2), 2);
        
        echo $totalTfIdf2;
?>
  