type MyType<T> = T extends true ? string : string[];

function test<T extends boolean>(single: T): MyType<T> {
	if (single) {
		return 'string' as MyType<T>;
	}
	return ['']
}

const test1 = test(true)
const test2 = test(false)
