import { Node } from "./Node.js";

export class List {
    constructor (head = null, tail = null, size = 0) {
        this.head = head;
        this.tail = tail;
        this.size = size;
    }

    insertHead (element) {
        const node = new Node(element);

        if (this.size === 0) {
            this.head = node;
            this.tail = node;
        } else {
            node.next = this.head;
            this.head.prev = node;
            this.head = node;
        }
        this.size++;
    }

    insertTail (element) {
        const node = new Node(element);

        if (this.size === 0) {
            this.tail = node;
            this.head = node;
        } else {
            node.prev = this.tail;
            this.tail.next = node;
            this.tail = node;
        }
        this.size++;
    }

    showAllList () {
        if (this.head) {
            let element = this.head;
            const array = [];
            while (element != null) {
                array.push(element.data);
                element = element.next;
            }
            return array;
        } else {
            return null;
        }
    }
}