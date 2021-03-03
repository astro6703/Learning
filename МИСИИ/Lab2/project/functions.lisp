(defun addToSortedListRecursive (item list)
  (if (null list)
    (list item)
    (if (> item (first list))
      (append (list (first list)) (addToSortedListRecursive item (cdr list)))
      (append (list item) list)
    )
  )
)

(defun getRange (list start end)
  (loop for i from start to end
    collect (nth i list)
  )
)

(defun range (min max step)
   (loop for n from min below max by step
      collect n
   )
)

(defun addToSortedListIterative (item list)
  (cond
    ((null list) (list item))
    ((> item (car (last list))) (append list (list item)))
    ((< item (first list)) (append (list item) list))
    (T (loop for i in (reverse (range 0 (length list) 1))
      when (> item (nth i list))
        return (append (getRange list 0 i) (list item) (getRange list (+ i 1) (- (length list) 1)))
    ))
  )
)

(print (addToSortedListRecursive 15 nil))
(print (addToSortedListRecursive 15 (list 3)))
(print (addToSortedListRecursive -15 (list 3)))
(print (addToSortedListRecursive 15 (list 1 2 3)))
(print (addToSortedListRecursive -15 (list 1 2 3)))
(print (addToSortedListRecursive 3 (list 1 2 15)))

(print (addToSortedListIterative 15 nil))
(print (addToSortedListIterative 15 (list 3)))
(print (addToSortedListIterative -15 (list 3)))
(print (addToSortedListIterative 15 (list 1 2 3)))
(print (addToSortedListIterative -15 (list 1 2 3)))
(print (addToSortedListIterative 3 (list 1 2 15)))