﻿using Testing.Util;
using Testing.UnitTesting;
using System.IO;

namespace Lab3
{
    public static class Program
    {
        static void Main(string[] args)
        {
            var fileLogger = new FileLogger(new StreamWriter(UnitTestConstants.Path, append:true));
            var testEngine = new TestEngine(fileLogger, UnitTestConstants.TestSuite);
            testEngine.Run();
        }
    }
}