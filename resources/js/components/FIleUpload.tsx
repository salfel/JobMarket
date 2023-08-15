import {FilePlusIcon, UploadIcon} from "@radix-ui/react-icons";
import {useEffect, useRef, useState} from "react";

type Props = {
	accept?: string,
	multiple?: boolean
}

export default function FileUpload({ accept = "*", multiple = false }: Props) {
	const [files, setFiles] = useState<File[]>([]);
	let input = useRef<HTMLInputElement>(null)

    return (
		<>
            {/* @ts-ignore */}
			<input type="file" ref={input} accept={accept} onChange={e => setFiles(files => [...files, ...e.target.files])} multiple={multiple} className="hidden"/>
			<button onClick={() => input.current?.click()} className="grid place-items-center w-60 h-40 rounded-xl border-dashed border border-gray-300">
				<FilePlusIcon className="w-8 h-8 text-gray-400" />
			</button>
		</>

	)
}

function File({ file }: { file: File}) {
	return (
		<div className="w-20 h-36 border border-gray-300 rounded-xl">
k
		</div>
	)
}
