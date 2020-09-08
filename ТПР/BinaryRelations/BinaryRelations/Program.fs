module BinaryRelations.Program

open System

let private printMatrix (matrix: int list list): unit =
    let size = matrix |> List.length
    for i in [0..size - 1] do
        for j in [0..size - 1] do
            matrix.[i].[j] |> printf " %d " |> ignore
        printfn "" |> ignore

let private printVector (vector: int list): unit =
    vector |> List.iter (fun x -> x |> printf " %d " |> ignore)

let private getMaxR (matrix: int list list): int list =
    let size = matrix |> List.length
    let maxR = [| for i in [0..size-1] do 1 |]

    for i in [0..size - 1] do
        for j in [0..size - 1] do
            if matrix.[i].[j] = 1 && matrix.[j].[i] = 0 then
                maxR.[j] <- 0
            if matrix.[j].[i] = 1 && maxR.[j] = 0 then
                maxR.[j] <- 0

    for i in [0..size - 1] do
        for j in [0..size - 1] do
            if matrix.[i].[j] = 1 && matrix.[j].[i] = 1 && maxR.[j] = 0 then
                maxR.[i] <- 0;

    maxR |> List.ofArray

[<EntryPoint>]
let main (_: string array): int =
    let matrices = [
        Data.relationGraphByVariant
        Data.picture5RelationGraph
        Data.picture7aRelationGraph
        Data.picture7bRelationGraph
        Data.relationGraphWithNoDominatingAlternative
    ]

    matrices
    |> List.map (fun x -> x, getMaxR x)
    |> List.iter (fun x ->
            let matrix, maxR = x

            printfn "%sProcessing graph:" (String.replicate 2 Environment.NewLine) |> ignore
            matrix |> printMatrix
            printfn "MaxR vector:" |> ignore
            matrix |> getMaxR |> printVector
        )

    0