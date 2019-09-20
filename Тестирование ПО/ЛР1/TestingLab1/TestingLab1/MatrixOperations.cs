﻿using System;
using System.Collections.Generic;
using System.Linq;

namespace TestingLab1
{
    public static class MatrixOperations
    {
        public static IEnumerable<int> GetSumOfColumnsWithoutNegativeElements(int[,] matrix)
        {
            if (matrix == null) throw new ArgumentNullException($"{nameof(matrix)} instance was null");
            if (matrix.GetLength(0) != matrix.GetLength(1)) throw new ArgumentException($"Only square martixes are allowed");

            return matrix
                    .GetColumns()
                    .Where(column => column.All(items => items > 0))
                    .Select(column => column.Sum());
        }
    }
}