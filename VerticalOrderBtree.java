import java.util.*;

class VerticalOrderBtree {
    static class Node {
        int data;
        Node left, right;
        
        public Node(int data) {
            this.data = data;
            this.left = this.right = null;
        }
    }
    TreeMap<Integer, ArrayList<Integer>> t = new TreeMap<>();
    
    public void getVerticalOrder(Node root, TreeMap<Integer, ArrayList<Integer>> t, int distance) {
        //base case
        if( root == null ) {
            return;
        }
        
        ArrayList<Integer> list = t.get(distance);

        if( list == null ) {
            list = new ArrayList<Integer>();
        }        
        list.add( root.data );
        t.put(distance, list);
        
        //go to left
        getVerticalOrder( root.left, t, distance-1 );
        
        //go to right
        getVerticalOrder( root.right, t, distance+1 );
    }
    
    public void printVerticalOrder( Node root ) {
        
        int distance = 0;
        getVerticalOrder(root, t, distance);
        
        System.out.println("TreeMap: " + t);
    }
    // Node root;
    public static void main(String[] args) {
        VerticalOrderBtree v = new VerticalOrderBtree();
        Node root = new Node(1);
        root.left = new Node(2);
        root.right = new Node(3);
        root.left.left = new Node(4);
        root.left.right = new Node(5);
        root.right.left = new Node(6);
        root.right.right = new Node(7);
        root.right.left.right = new Node(8);
        root.right.right.right = new Node(9);
        System.out.println("Vertical Order traversal is");
        v.printVerticalOrder(root);
    }
}
