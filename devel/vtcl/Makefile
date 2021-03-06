# Created by: Vanilla I. Shu <vanilla@MinJe.com.TW>
# $FreeBSD$

PORTNAME=	vtcl
PORTVERSION=	1.6.1a1
PORTREVISION=	2
CATEGORIES=	devel
MASTER_SITES=	SF/${PORTNAME}/${PORTNAME}/1.6.1.a1

MAINTAINER=	ports@FreeBSD.org
COMMENT=	Application Development Environment for Tcl/Tk

LICENSE=	GPLv2 # or later
LICENSE_FILE=	${WRKSRC}/LICENSE

OPTIONS_DEFINE=	DOCS EXAMPLES

NO_BUILD=	yes

USES+=		dos2unix tk:84
DOS2UNIX_FILES=	configure
HAS_CONFIGURE=	yes
CONFIGURE_ARGS=	${PREFIX}

PORTDOCS=	*
PORTEXAMPLES=	*

.include <bsd.port.options.mk>

post-patch:
	@${REINPLACE_CMD} -e \
		's|wish8.5|${WISH:T}| ; \
		 s|/usr/local/bin|${LOCALBASE}/bin|' ${WRKSRC}/configure
	@${REINPLACE_CMD} -i "" -e \
		's|require -exact Tk|require Tk|' ${WRKSRC}/lib/tkcon.tcl

do-install:
	${INSTALL_SCRIPT} ${WRKSRC}/vtcl ${STAGEDIR}${PREFIX}/bin
	@${MKDIR} ${STAGEDIR}${PREFIX}/lib/vtcl
.for data in ChangeLog README vtcl.tcl
	${INSTALL_DATA} ${WRKSRC}/${data} ${STAGEDIR}${PREFIX}/lib/vtcl
.endfor
	@${MKDIR} ${STAGEDIR}${PREFIX}/lib/vtcl/images
.for sufx in gif ppm xbm xpm
	${INSTALL_DATA} ${WRKSRC}/images/*.${sufx} ${STAGEDIR}${PREFIX}/lib/vtcl/images
.endfor
	@${MKDIR} ${STAGEDIR}${PREFIX}/lib/vtcl/images/edit
	${INSTALL_DATA} ${WRKSRC}/images/edit/*.gif ${STAGEDIR}${PREFIX}/lib/vtcl/images/edit
	@${MKDIR} ${STAGEDIR}${PREFIX}/lib/vtcl/lib
	@(cd ${WRKSRC}/lib && ${COPYTREE_SHARE} . ${STAGEDIR}${PREFIX}/lib/vtcl/lib)
.if ${PORT_OPTIONS:MDOCS}
	@${MKDIR} ${STAGEDIR}${DOCSDIR}
	@(cd ${WRKSRC}/doc && ${COPYTREE_SHARE} . ${STAGEDIR}${DOCSDIR})
.endif
.if ${PORT_OPTIONS:MEXAMPLES}
	@${MKDIR} ${STAGEDIR}${EXAMPLESDIR}/sample
	@(cd ${WRKSRC}/sample && ${COPYTREE_SHARE} . ${STAGEDIR}${EXAMPLESDIR}/sample)
	@${MKDIR} ${STAGEDIR}${EXAMPLESDIR}/demo
	@(cd ${WRKSRC}/demo && ${COPYTREE_SHARE} . ${STAGEDIR}${EXAMPLESDIR}/demo)
.endif

.include <bsd.port.mk>
