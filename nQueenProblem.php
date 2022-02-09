<?php

    function printSolution($board)
    {
        foreach( $board as $key => $value) {
            foreach( $value as $val ) {
                echo $val ."  ";
            }
            echo "\n";
        }
    }

    function IsSafer(&$board, $row, $col)
    {
        global $N;
        $i; $j;

        for ($i = 0; $i < $col; ++$i)
            if ($board[$row][$i])
                return false;

        for ($i = $row, $j = $col; $i >= 0 && $j >= 0; --$i, --$j)
            if ($board[$i][$j])
                return false;

        for ($i = $row, $j = $col; $j >= 0 && $i < $N; ++$i, --$j)
            if ($board[$i][$j])
                return false;

        return true;
    }

    function SolveNQ(&$board, $col)
    {
        global $N;
        if ($col >= $N)
            return true;

        for ($i = 0; $i < $N; ++$i)
        {
            if (IsSafer($board, $i, $col))
            {
                $board[$i][$col] = 1;

                if (SolveNQ($board, $col + 1))
                    return true;

               $board[$i][$col] = 0;
            }
        }

        return false;
    }

    function Solve($N = 4)
    {

        for( $i = 0; $i < $N; $i++ ) {
            for( $j = 0; $j < $N; $j++ ) {
                $board[$i][$j] = 0;
            }
        }
 
        echo "Before queen placing \n";
        PrintSolution($board);
        
        if (SolveNQ($board, 0) == false) {
            echo "Solution does not exist";
            return false;
        }

        echo "After queen placing \n";

        PrintSolution($board);
        return true;
    }

    $N = (int)readline('Enter a string: ');
    Solve($N);

?>
