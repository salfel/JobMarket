import React from "react"
import type { Pagination } from '@/lib/types'
import { Button } from "@/components/ui/button";
import { Link } from '@inertiajs/react'

interface Props {
	paginator: Pagination<any>
}

export default function Paginator({ paginator }: Props) {
	return (
		paginator.total > paginator.per_page &&
		<div className="flex items-center justify-center gap-1 my-5">
			{paginator.links.map((link, i) => (
				<Link disabled={Boolean(link.url)} href={link.url} className={link.url ? '': 'pointer-events-none'} key={i}>
					<Button variant="outline" disabled={!link.url} className={link.active ? 'text-white bg-slate-900 hover:bg-slate-800 hover:text-white': ''} dangerouslySetInnerHTML={{ __html: link.label}}/>
				</Link>
			))}
		</div>
	)
}
